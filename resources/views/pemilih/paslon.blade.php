@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Pilih Paslon</h1>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($paslons as $paslon)
            <div class="bg-white rounded-lg shadow p-5">
                <h2 class="text-xl font-bold text-blue-700 mb-2">{{ $paslon->nama_ketua }} & {{ $paslon->nama_wakil }}</h2>
                <p><strong>Visi:</strong> {{ $paslon->visi }}</p>
                <p><strong>Misi:</strong> {{ $paslon->misi }}</p>

                <form action="{{ route('vote.store', $paslon->id) }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full"
                        {{ auth()->user()->sudah_memilih ? 'disabled' : '' }}>
                        Pilih Paslon Ini
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
