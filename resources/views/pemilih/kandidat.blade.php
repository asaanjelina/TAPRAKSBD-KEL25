@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Daftar Kandidat</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($paslons as $paslon)
            <div class="bg-white rounded-lg shadow p-5">
                <h2 class="text-xl font-semibold text-gray-900">{{ $paslon->nama_ketua }} & {{ $paslon->nama_wakil }}</h2>
                <p class="text-sm text-gray-700 mt-2"><strong>Visi:</strong> {{ $paslon->visi }}</p>
                <p class="text-sm text-gray-700 mt-1"><strong>Misi:</strong> {{ $paslon->misi }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
