@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">
    <div class="bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">🗳️ Pilih Paslon</h2>

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($paslons as $paslon)
                <div class="p-6 bg-gray-50 rounded-lg border shadow">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $paslon->nama_ketua }} & {{ $paslon->nama_wakil }}</h3>
                    <p class="text-sm text-gray-600 mb-2"><strong>Visi:</strong> {{ $paslon->visi }}</p>
                    <p class="text-sm text-gray-600 mb-4"><strong>Misi:</strong> {{ $paslon->misi }}</p>

                    <form action="{{ route('vote.store', $paslon->id) }}" method="POST" onsubmit="return confirm('Yakin memilih paslon ini?')">
                        @csrf
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded shadow">
                            ✅ Pilih Paslon Ini
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
