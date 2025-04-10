@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">
    <div class="bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-2">Dashboard Pemilih</h2>
        <p class="text-base text-gray-600 mb-6">Selamat datang! Di bawah ini statusmu dan beberapa aksi yang bisa kamu lakukan.</p>

        {{-- STATUS MEMILIH --}}
        <div class="mb-8 p-4 bg-gray-50 border-l-4 border-blue-500 rounded-lg">
            <p class="text-sm text-gray-700 font-medium mb-1">Status Memilih:</p>
            @if(auth()->user()->sudah_memilih)
                <span class="text-green-600 font-bold text-xl">✅ Sudah memilih</span>
            @else
                <span class="text-red-500 font-bold text-xl">❌ Belum memilih</span>
            @endif
        </div>

        {{-- TOMBOL ARAH HALAMAN --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @if(!auth()->user()->sudah_memilih)
            <a href="{{ route('pemilih.vote.index') }}"
               class="flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 rounded-xl text-lg font-semibold shadow transition duration-200">
               🗳️ <span class="ml-2">Masuk Halaman Voting</span>
            </a>
            @endif

            <a href="{{ route('pemilih.paslon.index') }}"
               class="flex items-center justify-center bg-gray-800 hover:bg-gray-900 text-white px-6 py-4 rounded-xl text-lg font-semibold shadow transition duration-200">
               👥 <span class="ml-2">Lihat Daftar Paslon</span>
            </a>

            <a href="{{ route('pemilih.kandidat.index') }}"
               class="flex items-center justify-center bg-gray-600 hover:bg-gray-700 text-white px-6 py-4 rounded-xl text-lg font-semibold shadow transition duration-200">
               🎓 <span class="ml-2">Lihat Daftar Kandidat</span>
            </a>
        </div>
    </div>
</div>
@endsection
