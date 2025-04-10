@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="bg-white shadow rounded-lg">
        <div class="bg-yellow-400 text-white px-6 py-4 rounded-t-lg">
            <h2 class="text-lg font-semibold">Edit Paslon</h2>
        </div>

        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.paslon.update', $paslon->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nama_ketua" class="block text-sm font-medium text-gray-700">Nama Ketua</label>
                    <input type="text" id="nama_ketua" name="nama_ketua" value="{{ $paslon->nama_ketua }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="nama_wakil" class="block text-sm font-medium text-gray-700">Nama Wakil</label>
                    <input type="text" id="nama_wakil" name="nama_wakil" value="{{ $paslon->nama_wakil }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="visi" class="block text-sm font-medium text-gray-700">Visi</label>
                    <textarea id="visi" name="visi" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm">{{ $paslon->visi }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="misi" class="block text-sm font-medium text-gray-700">Misi</label>
                    <textarea id="misi" name="misi" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-yellow-400 focus:border-yellow-400 sm:text-sm">{{ $paslon->misi }}</textarea>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('admin.paslon.index') }}"
                       class="inline-block text-sm px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded transition">
                        ← Kembali
                    </a>
                    <button type="submit"
                            class="inline-block text-sm px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
