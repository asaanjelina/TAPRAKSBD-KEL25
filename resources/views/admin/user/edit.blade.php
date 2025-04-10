@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pemilih</h1>
    <form action="{{ route('pemilih.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (plaintext):</label>
            <input type="text" class="form-control" name="password" value="{{ $user->password }}" required>
        </div>
        <input type="hidden" name="role" value="pemilih">
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
