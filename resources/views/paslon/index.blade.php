@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">📋 Daftar Paslon</h1>

    <a href="{{ route('admin.paslon.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded mb-6 inline-block">
        + Tambah Paslon
    </a>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama Visi</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($paslons as $paslon)
                    <tr>
                        <td class="px-6 py-4 text-gray-900">{{ $paslon->visi }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('admin.paslon.edit', $paslon->id) }}" class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('admin.paslon.destroy', $paslon->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin mau hapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-gray-500">Belum ada paslon.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
