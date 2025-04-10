@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pemilih</h1>
    <form action="{{ route('pemilih.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (plaintext):</label>
            <input type="text" class="form-control" name="password" required>
        </div>
        <input type="hidden" name="role" value="pemilih">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
