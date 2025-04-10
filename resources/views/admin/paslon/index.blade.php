@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Data Paslon</h2>
        <a href="{{ route('admin.paslon.create') }}"
        class="bg-yellow-400 text-white font-semibold px-4 py-2 rounded shadow hover:bg-yellow-500">
            + Tambah Paslon
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white text-sm text-left text-gray-700 border rounded-lg shadow">
            <thead class="bg-gray-200 text-gray-800 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Ketua</th>
                    <th class="px-4 py-3">Nama Wakil</th>
                    <th class="px-4 py-3">Visi</th>
                    <th class="px-4 py-3">Misi</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($paslons as $index => $paslon)
                    <tr>
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $paslon->nama_ketua }}</td>
                        <td class="px-4 py-2">{{ $paslon->nama_wakil }}</td>
                        <td class="px-4 py-2">{{ $paslon->visi }}</td>
                        <td class="px-4 py-2">{{ $paslon->misi }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.paslon.edit', $paslon->id) }}"
                               class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-1 rounded">
                                Edit
                            </a>
                            <form action="{{ route('admin.paslon.destroy', $paslon->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus paslon ini?')"
                                        class="inline-block bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">Belum ada paslon yang ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Footer --}}
<footer class="text-center text-[10px] text-gray-400 mt-10 pt-2 pb-4 border-t border-gray-200">
    © {{ date('Y') }} - TAPRAKTIKUM SBD — Kelompok 25
</footer>
@endsection
