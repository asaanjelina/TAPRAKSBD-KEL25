<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Paslon;
use App\Models\User;

class VotingController extends Controller
{
    public function index()
    {
        $paslons = Paslon::all();
        return view('voting.index', compact('paslons'));
    }

    public function vote($id)
    {
        $user = Auth::user();

        // Cek apakah user sudah memilih
        if ($user->paslon_id !== null) {
            return redirect()->back()->with('error', 'Kamu sudah memilih!');
        }

        $user->paslon_id = $id;
        $user->save();

        return redirect()->back()->with('success', 'Voting berhasil!');
    }
}
