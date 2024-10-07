<?php

namespace App\Http\Controllers;

use App\Models\Gelar_Belakang;
use App\Models\Gelar_Depan;
use Illuminate\Http\Request;

class GelarController extends Controller
{
    // Menampilkan halaman index
    public function index()
    {
        $gelarB = Gelar_Belakang::all();
        $gelarD = Gelar_Depan::all();
        return view('testing.gelar.index', compact('gelarB', 'gelarD'));
    }

    // Menampilkan form create untuk Gelar Depan
    public function createDepan()
    {
        return view('testing.gelar.create_depan');
    }

    // Menyimpan Gelar Depan baru
    public function storeDepan(Request $request)
    {
        $request->validate([
            'nama_gelar_depan' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        Gelar_Depan::create([
            'nama_gelar_depan' => $request->nama_gelar_depan,
            'status' => $request->status,
        ]);

        return redirect()->route('gelar.index')->with('success', 'Gelar Depan berhasil ditambahkan.');
    }

    // Menampilkan form edit untuk Gelar Depan
    public function editDepan($id)
    {
        $gelarDepan = Gelar_Depan::findOrFail($id);
        return view('testing.gelar.edit_depan', compact('gelarDepan'));
    }

    // Mengupdate Gelar Depan
    public function updateDepan(Request $request, $id)
    {
        $request->validate([
            'nama_gelar_depan' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $gelarDepan = Gelar_Depan::findOrFail($id);
        $gelarDepan->update([
            'nama_gelar_depan' => $request->nama_gelar_depan,
            'status' => $request->status,
        ]);

        return redirect()->route('gelar.index')->with('success', 'Gelar Depan berhasil diperbarui.');
    }

    // Menampilkan form create untuk Gelar Belakang
    public function createBelakang()
    {
        return view('testing.gelar.create_belakang');
    }

    // Menyimpan Gelar Belakang baru
    public function storeBelakang(Request $request)
    {
        $request->validate([
            'nama_gelar_belakang' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        Gelar_Belakang::create([
            'nama_gelar_belakang' => $request->nama_gelar_belakang,
            'status' => $request->status,
        ]);

        return redirect()->route('gelar.index')->with('success', 'Gelar Belakang berhasil ditambahkan.');
    }

    // Menampilkan form edit untuk Gelar Belakang
    public function editBelakang($id)
    {
        $gelarBelakang = Gelar_Belakang::findOrFail($id);
        return view('testing.gelar.edit_belakang', compact('gelarBelakang'));
    }

    // Mengupdate Gelar Belakang
    public function updateBelakang(Request $request, $id)
    {
        $request->validate([
            'nama_gelar_belakang' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $gelarBelakang = Gelar_Belakang::findOrFail($id);
        $gelarBelakang->update([
            'nama_gelar_belakang' => $request->nama_gelar_belakang,
            'status' => $request->status,
        ]);

        return redirect()->route('gelar.index')->with('success', 'Gelar Belakang berhasil diperbarui.');
    }
}