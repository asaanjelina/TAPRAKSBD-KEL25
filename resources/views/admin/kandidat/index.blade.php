@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    <div class="mb-6 border-b border-blue-500 pb-3">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Kandidat</h2>
        <p class="text-sm text-gray-500">Daftar kandidat yang aktif dan yang telah dihapus sementara.</p>
    </div>

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('admin.kandidat.trash') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200 text-sm font-medium shadow-sm">
            🗑️ Lihat Sampah
        </a>
        <a href="{{ route('admin.kandidat.create') }}" class="bg-yellow-400 text-white font-semibold px-4 py-2 rounded shadow hover:bg-yellow-500">
            + Tambah Kandidat
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg border border-gray-200">
        <table class="min-w-full text-left">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="py-3 px-4">Foto</th>
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Angkatan</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($kandidats as $k)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4">
                        <img src="{{ asset('storage/' . $k->foto) }}" alt="Foto Kandidat" class="w-16 h-16 object-cover rounded shadow">
                    </td>
                    <td class="py-2 px-4 font-medium">{{ $k->nama }}</td>
                    <td class="py-2 px-4">{{ $k->angkatan }}</td>
                    <td class="py-2 px-4">
                        @if($k->trashed())
                            <span class="inline-block px-2 py-1 text-xs bg-red-100 text-red-700 rounded">Terhapus</span>
                        @else
                            <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Aktif</span>
                        @endif
                    </td>
                    <td class="py-2 px-4 flex gap-2">
                        @if(!$k->trashed())
                            <a href="{{ route('admin.kandidat.edit', $k->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">Edit</a>
                            <form action="{{ route('admin.kandidat.destroy', $k->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus sementara kandidat ini?')" type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Hapus</button>
                            </form>
                        @else
                            <form action="{{ route('admin.kandidat.restore', $k->id) }}" method="POST">
                                @csrf
                                <button onclick="return confirm('Kembalikan kandidat ini?')" type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 text-sm">Restore</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection