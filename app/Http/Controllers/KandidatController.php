<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    public function index()
    {
        $kandidats = Kandidat::whereNull('deleted_at')->get(); // hanya yg aktif
        return view('admin.kandidat.index', compact('kandidats'));
    }
    
public function trash()
{
    $kandidats = Kandidat::onlyTrashed()->get();
    return view('admin.kandidat.trash', compact('kandidats'));
}

    public function create()
    {
        return view('admin.kandidat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'angkatan' => 'nullable|string|max:10',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama', 'angkatan']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kandidat', 'public');
        }

        Kandidat::create($data);

        return redirect()->route('admin.kandidat.index')->with('success', 'Kandidat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kandidat = Kandidat::withTrashed()->findOrFail($id);
        return view('admin.kandidat.edit', compact('kandidat'));
    }

    public function update(Request $request, $id)
    {
        $kandidat = Kandidat::withTrashed()->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'angkatan' => 'nullable|string|max:10',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama', 'angkatan']);

        if ($request->hasFile('foto')) {
            if ($kandidat->foto) {
                Storage::disk('public')->delete($kandidat->foto);
            }
            $data['foto'] = $request->file('foto')->store('kandidat', 'public');
        }

        $kandidat->update($data);

        return redirect()->route('admin.kandidat.index')->with('success', 'Kandidat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $kandidat->delete();
        return redirect()->route('admin.kandidat.index')->with('success', 'Kandidat berhasil dihapus (sementara).');
    }

    public function restore($id)
    {
        $kandidat = Kandidat::onlyTrashed()->findOrFail($id);
        $kandidat->restore();
        return redirect()->route('admin.kandidat.index')->with('success', 'Kandidat berhasil dikembalikan.');
    }
}
