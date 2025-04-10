@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Silakan Pilih Paslon</h2>

    @foreach ($paslons as $paslon)
        <div style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;">
            <h4>{{ $paslon->nama_ketua }} & {{ $paslon->nama_wakil }}</h4>
            <p><strong>Visi:</strong> {{ $paslon->visi }}</p>
            <p><strong>Misi:</strong> {{ $paslon->misi }}</p>

            <form action="{{ route('vote.store', $paslon->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Pilih</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
