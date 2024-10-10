<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function index()
    {
        $kota = Kota::with('provinsi')->get(); // Mengambil semua data kota beserta provinsi
        $provinsi = Provinsi::all(); // Mengambil data provinsi untuk dipilih di dropdown
        return view('home.anggota.komponen.buat_kota', compact('kota', 'provinsi'));
    }

    // public function index()
    // {
    //     $kota = Kota::with('provinsi')->get(); // Mengambil semua data kota beserta provinsi
    //     return view('testing.Kota.index', compact('kota'));
    // }

    // Menampilkan form untuk membuat kota baru (Create - Form)
    public function create()
    {
        $provinsi = Provinsi::all(); // Mengambil data provinsi untuk dipilih di dropdown
        return view('testing.kota.create', compact('provinsi'));
    }

    // Menyimpan kota baru ke database (Create - Store)
    public function store(Request $request)
    {
        $request->validate([
            'nama_kota' => 'required|string|max:255',
            'id_provinsi' => 'nullable|exists:provinsi,id_provinsi',
        ]);

        Kota::create([
            'nama_kota' => $request->nama_kota,
            'id_provinsi' => $request->id_provinsi,
        ]);

        return redirect()->route('kota.index')->with('success', 'Kota berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit kota (Update - Form)
    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all(); // Mengambil data provinsi untuk dropdown
        return view('testing.kota.edit', compact('kota', 'provinsi'));
    }

    // Mengupdate data kota di database (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kota' => 'required|string|max:255',
            'id_provinsi' => 'nullable|exists:provinsi,id_provinsi',
        ]);

        $kota = Kota::findOrFail($id);
        $kota->update([
            'nama_kota' => $request->nama_kota,
            'id_provinsi' => $request->id_provinsi,
        ]);

        return redirect()->route('kota.index')->with('success', 'Kota berhasil diperbarui.');
    }
}
