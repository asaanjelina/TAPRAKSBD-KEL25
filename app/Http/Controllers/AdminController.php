<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paslon;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Tampilkan dashboard admin
    public function dashboard()
    {
        $totalPaslon = Paslon::count();
        $totalPemilih = User::where('role', 'pemilih')->count();
        $sudahMemilih = User::where('role', 'pemilih')->where('sudah_memilih', true)->count();
    
        return view('admin.dashboard', compact('totalPaslon', 'totalPemilih', 'sudahMemilih'));
    }
    

    // Tampilkan semua paslon
    public function index()
    {
        $paslons = Paslon::all();
        return view('admin.paslon.index', compact('paslons'));
    }

    // Tampilkan form tambah paslon
    public function create()
    {
        return view('admin.paslon.create');
    }

    // Simpan data paslon baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_ketua' => 'required',
            'nama_wakil' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        Paslon::create($request->all());

        return redirect()->route('admin.paslon.index')->with('success', 'Paslon berhasil ditambahkan');
    }

    // Tampilkan form edit paslon
    public function edit($id)
    {
        $paslon = Paslon::findOrFail($id);
        return view('admin.paslon.edit', compact('paslon'));
    }

    // Update data paslon
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

        return redirect()->route('admin.paslon.index')->with('success', 'Paslon berhasil diupdate');
    }

    // Hapus paslon
    public function destroy($id)
    {
        $paslon = Paslon::findOrFail($id);
        $paslon->delete();

        return redirect()->route('admin.paslon.index')->with('success', 'Paslon berhasil dihapus');
    }

    // Tampilkan hasil pemilu
    public function hasil()
    {
        $hasil = DB::table('paslons')
        ->leftJoin('users', 'paslons.id', '=', 'users.paslon_id')
        ->select('paslons.id as paslon_id', 'paslons.nama_ketua', 'paslons.nama_wakil', DB::raw('count(users.id) as jumlah_suara'))
        ->where(function ($query) {
            $query->where('users.role', 'pemilih')->orWhereNull('users.role');
        })
        ->groupBy('paslons.id', 'paslons.nama_ketua', 'paslons.nama_wakil')
        ->get();
    
    $pemilihs = User::where('role', 'pemilih')->whereNotNull('paslon_id')->get();
    
    return view('admin.hasil', compact('hasil', 'pemilihs'));
    }    
    
}    
