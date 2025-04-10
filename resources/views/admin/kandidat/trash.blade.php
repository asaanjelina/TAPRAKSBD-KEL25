@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-bold mb-4">Sampah Kandidat</h2>

<a href="{{ route('admin.kandidat.index') }}" class="text-blue-500 underline mb-4 inline-block">← Kembali ke daftar kandidat</a>

<table class="w-full table-auto border">
    <thead>
        <tr>
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Angkatan</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kandidats as $kandidat)
        <tr>
            <td class="border px-4 py-2">{{ $kandidat->nama }}</td>
            <td class="border px-4 py-2">{{ $kandidat->angkatan }}</td>
            <td class="border px-4 py-2">
                <form action="{{ route('admin.kandidat.restore', $kandidat->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
