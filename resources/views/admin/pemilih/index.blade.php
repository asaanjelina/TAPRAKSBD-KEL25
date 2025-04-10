@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    <div class="bg-white shadow-md rounded-md p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-semibold">Data Pemilih</h2>
            <a href="{{ route('admin.pemilih.create') }}" class="bg-yellow-400 text-white font-semibold px-4 py-2 rounded shadow hover:bg-yellow-500">+ Tambah Pemilih</a>
        </div>
        <form action="{{ route('admin.pemilih.index') }}" method="GET" class="mb-4">
    <input type="text" name="search" placeholder="Cari nama atau NIM..." value="{{ request('search') }}" class="px-4 py-2 border rounded w-1/3">
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Cari</button>
</form>

        <table class="min-w-full border rounded-md overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="py-2 px-4">NO</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">NIM</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Status</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white text-gray-800">
                @foreach ($pemilihs as $i => $p)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $i+1 }}</td>
                    <td class="py-2 px-4">{{ $p->nama }}</td>
                    <td class="py-2 px-4">{{ $p->nim }}</td>
                    <td class="py-2 px-4">{{ $p->email }}</td>
                    <td class="py-2 px-4">
                        @if($p->sudah_memilih)
                            ✅
                        @else
                            ❌
                        @endif
                    </td>
                    <td class="py-2 px-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.pemilih.edit', $p->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-sm">Edit</a>
                            <form action="{{ route('admin.pemilih.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pemilih ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
