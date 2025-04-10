@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Kandidat</h2>

    <form action="{{ route('admin.kandidat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" name="nama" id="nama" required class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <div class="mb-4">
            <label for="angkatan" class="block text-gray-700 font-semibold mb-2">Angkatan</label>
            <input type="text" name="angkatan" id="angkatan" required class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <div class="mb-4">
            <label for="foto" class="block text-gray-700 font-semibold mb-2">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*" required class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
</div>
@endsection
