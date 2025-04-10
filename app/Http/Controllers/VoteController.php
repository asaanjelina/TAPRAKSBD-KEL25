<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paslon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index()
    {
        $paslons = Paslon::all();
        return view('pemilih.vote', compact('paslons'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->sudah_memilih) {
            return redirect()->route('vote.index')->with('error', 'Kamu sudah memilih.');
        }

        $user->update([
            'paslon_id' => $request->paslon_id,
            'sudah_memilih' => true
        ]);

        return redirect()->route('vote.index')->with('success', 'Berhasil memilih.');
    }
}
