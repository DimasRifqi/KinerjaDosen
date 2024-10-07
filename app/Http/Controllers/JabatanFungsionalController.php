<?php

namespace App\Http\Controllers;

use App\Models\Jabatan_Fungsional;
use Illuminate\Http\Request;

class JabatanFungsionalController extends Controller
{
    public function index()
    {
        $jabatanFungsional = Jabatan_Fungsional::all();
        return view('testing.jabatan_fungsional.index', compact('jabatanFungsional'));
    }

    public function create()
    {
        return view('testing.jabatan_fungsional.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
        ]);

        Jabatan_Fungsional::create($request->all());

        return redirect()->route('jabatan-fungsional.index')->with('success', 'Jabatan Fungsional berhasil ditambahkan.');
    }

    public function edit(Jabatan_Fungsional $jabatanFungsional)
    {
        return view('testing.jabatan_fungsional.edit', compact('jabatanFungsional'));
    }

    public function update(Request $request, Jabatan_Fungsional $jabatanFungsional)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
        ]);

        $jabatanFungsional->update($request->all());

        return redirect()->route('jabatan-fungsional.index')->with('success', 'Jabatan Fungsional berhasil diperbarui.');
    }

    public function destroy(Jabatan_Fungsional $jabatanFungsional)
    {
        $jabatanFungsional->delete();

        return redirect()->route('jabatan-fungsional.index')->with('success', 'Jabatan Fungsional berhasil dihapus.');
    }
}