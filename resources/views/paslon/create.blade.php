@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Paslon</h2>
        <form method="POST" action="{{ route('admin.paslon.store') }}">
            @csrf
            <div class="form-group">
                <label>Nama Ketua</label>
                <input type="text" name="nama_ketua" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Wakil</label>
                <input type="text" name="nama_wakil" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Visi</label>
                <textarea name="visi" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Misi</label>
                <textarea name="misi" class="form-control" required></textarea>
            </div>
            <button class="btn btn-success mt-2">Simpan</button>
        </form>
    </div>
@endsection
