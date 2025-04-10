@extends('layouts.admin')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md max-w-3xl mx-auto border border-gray-200">
    <div class="mb-6 border-b border-blue-500 pb-3">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Paslon</h2>
        <p class="text-sm text-gray-500">Silakan isi informasi pasangan calon di bawah ini.</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.paslon.store') }}" class="space-y-5">
        @csrf

        <div>
            <label for="nama_ketua" class="block text-sm font-medium text-gray-700">Nama Ketua</label>
            <input type="text" id="nama_ketua" name="nama_ketua" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
        </div>

        <div>
            <label for="nama_wakil" class="block text-sm font-medium text-gray-700">Nama Wakil</label>
            <input type="text" id="nama_wakil" name="nama_wakil" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
        </div>

        <div>
            <label for="visi" class="block text-sm font-medium text-gray-700">Visi</label>
            <textarea id="visi" name="visi" rows="3" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2"></textarea>
        </div>

        <div>
            <label for="misi" class="block text-sm font-medium text-gray-700">Misi</label>
            <textarea id="misi" name="misi" rows="3" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2"></textarea>
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.paslon.index') }}"
               class="bg-gray-100 hover:bg-gray-200 text-gray-800 border border-gray-300 px-4 py-2 rounded-md text-sm font-medium shadow-sm">
                ← Kembali
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md text-sm font-medium shadow-sm">
                Simpan
            </button>
        </div>
    </form>
</div>


@endsection
