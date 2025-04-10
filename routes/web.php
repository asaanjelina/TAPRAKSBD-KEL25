<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PaslonController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\KandidatController;

// ==================== HALAMAN AWAL ====================
Route::get('/', function () {
    return view('welcome');
});

// ==================== AUTENTIKASI ====================
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// ==================== DASHBOARD ====================
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Tombol migrasi dev (sementara)
Route::get('/migrate-now', function () {
    Artisan::call('migrate');
    return "Migrasi berhasil dijalankan! ✅";
});

// ==================== ADMIN ROUTES ====================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // CRUD Paslon
    Route::get('/paslon', [AdminController::class, 'index'])->name('paslon.index');
    Route::get('/paslon/create', [AdminController::class, 'create'])->name('paslon.create');
    Route::post('/paslon', [AdminController::class, 'store'])->name('paslon.store');
    Route::get('/paslon/{id}/edit', [AdminController::class, 'edit'])->name('paslon.edit');
    Route::put('/paslon/{id}', [AdminController::class, 'update'])->name('paslon.update');
    Route::delete('/paslon/{id}', [AdminController::class, 'destroy'])->name('paslon.destroy');

    // CRUD Kandidat (dengan soft delete & restore)
    Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
    Route::get('/kandidat/create', [KandidatController::class, 'create'])->name('kandidat.create');
    Route::post('/kandidat', [KandidatController::class, 'store'])->name('kandidat.store');
    Route::get('/kandidat/{id}/edit', [KandidatController::class, 'edit'])->name('kandidat.edit');
    Route::put('/kandidat/{id}', [KandidatController::class, 'update'])->name('kandidat.update');
    Route::delete('/kandidat/{id}', [KandidatController::class, 'destroy'])->name('kandidat.destroy');
    Route::post('/kandidat/{id}/restore', [KandidatController::class, 'restore'])->name('kandidat.restore');
    Route::get('/kandidat/trash', [KandidatController::class, 'trash'])->name('kandidat.trash');


    // CRUD Pemilih
    Route::resource('pemilih', PemilihController::class);

    // Hasil voting
    Route::get('/hasil', [AdminController::class, 'hasil'])->name('hasil');
    Route::get('/hasil/{id}/pemilih', [AdminController::class, 'detailPemilih'])->name('hasil.pemilih');
});

// ==================== ROUTE UNTUK PEMILIH ====================
Route::middleware(['auth', 'pemilih'])->prefix('pemilih')->name('pemilih.')->group(function () {
    Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
    Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');

    Route::get('/dashboard', [HomeController::class, 'pemilihDashboard'])->name('dashboard');
    Route::get('/paslon', [PaslonController::class, 'index'])->name('paslon.index'); 
    Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
});


// ==================== ROUTE AUTH TAMBAHAN ====================
require __DIR__.'/auth.php';
