<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;

class User extends Authenticatable
{
    protected $fillable = [
        'nama',
        'name',
        'nim',
        'email',
        'password',
        'role',
        'sudah_memilih',
        'paslon_id',
    ];
    
    public function paslon()
{
    return $this->belongsTo(Paslon::class);
}
public function store($id)
{
    $user = Auth::user();

    if ($user->sudah_memilih) {
        return redirect()->route('vote.index')->with('error', 'Kamu sudah memilih!');
    }

    $user->update([
        'paslon_id' => $id,
        'sudah_memilih' => true
    ]);

    return redirect()->route('vote.index')->with('success', 'Berhasil memilih!');
}

}
