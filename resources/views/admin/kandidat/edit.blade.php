@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Kandidat</h2>

    <form action="{{ route('admin.kandidat.update', $kandidat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ $kandidat->nama }}" required class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <div class="mb-4">
            <label for="angkatan" class="block text-gray-700 font-semibold mb-2">Angkatan</label>
            <input type="text" name="angkatan" id="angkatan" value="{{ $kandidat->angkatan }}" required class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Foto Saat Ini:</label>
            <img src="{{ asset('storage/kandidat/' . $kandidat->foto) }}" alt="Foto Kandidat" class="w-32 h-32 object-cover rounded mb-2">
            <input type="file" name="foto" accept="image/*" class="w-full border-gray-300 rounded-lg shadow-sm">
            <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
        </div>

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Perbarui</button>
    </form>
</div>
@endsection
