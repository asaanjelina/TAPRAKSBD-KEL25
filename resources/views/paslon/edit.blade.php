@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Paslon</h2>
        <form method="POST" action="{{ route('paslon.update', $paslon->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Ketua</label>
                <input type="text" name="nama_ketua" class="form-control" value="{{ $paslon->nama_ketua }}" required>
            </div>
            <div class="form-group">
                <label>Nama Wakil</label>
                <input type="text" name="nama_wakil" class="form-control" value="{{ $paslon->nama_wakil }}" required>
            </div>
            <div class="form-group">
                <label>Visi</label>
                <textarea name="visi" class="form-control" required>{{ $paslon->visi }}</textarea>
            </div>
            <div class="form-group">
                <label>Misi</label>
                <textarea name="misi" class="form-control" required>{{ $paslon->misi }}</textarea>
            </div>
            <button class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
@endsection
