<?php

namespace App\Http\Controllers;

use App\Models\Paslon;
use Illuminate\Http\Request;

class PaslonController extends Controller
{
    public function index()
    {
        $paslons = Paslon::all();
        return view('paslon.index', compact('paslons'));
    }

    public function create()
    {
        return view('paslon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ketua' => 'required',
            'nama_wakil' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        Paslon::create($request->all());
        return redirect()->route('paslon.index')->with('success', 'Paslon berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $paslon = Paslon::findOrFail($id);
        return view('paslon.edit', compact('paslon'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ketua' => 'required',
            'nama_wakil' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $paslon = Paslon::findOrFail($id);
        $paslon->update($request->all());
        return redirect()->route('paslon.index')->with('success', 'Paslon berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $paslon = Paslon::findOrFail($id);
        $paslon->delete();
        return redirect()->route('paslon.index')->with('success', 'Paslon berhasil dihapus!');
    }
}
