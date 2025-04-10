<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PemilihController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'pemilih');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('nim', 'like', "%$search%");
            });
        }

        $pemilihs = $query->get();
        return view('admin.pemilih.index', compact('pemilihs'));
    }

    public function create()
    {
        return view('admin.pemilih.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:users,nim',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'name' => $request->nama, // ← tetap isi kolom 'name'
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => $request->password, // plaintext sesuai config
            'role' => 'pemilih',
            'sudah_memilih' => false,
        ]);

        return redirect()->route('admin.pemilih.index')->with('success', 'Data pemilih berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pemilih = User::findOrFail($id);
        return view('admin.pemilih.edit', compact('pemilih'));
    }

    public function update(Request $request, $id)
    {
        $pemilih = User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:users,nim,' . $pemilih->id,
            'email' => 'required|email|unique:users,email,' . $pemilih->id,
        ]);

        $pemilih->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => $request->password ?? $pemilih->password,
        ]);

        return redirect()->route('admin.pemilih.index')->with('success', 'Data pemilih berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemilih = User::findOrFail($id);
        $pemilih->delete();

        return redirect()->route('admin.pemilih.index')->with('success', 'Data pemilih berhasil dihapus.');
    }
}
