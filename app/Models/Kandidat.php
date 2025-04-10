<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <- tambahin ini

class Kandidat extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = ['nama', 'angkatan', 'foto'];
}
