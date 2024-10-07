<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Pangkat_Dosen;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Periode;
use App\Models\Prodi;
use App\Models\Universitas;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function indexPeriode(){
        $periode = Periode::all();

        return view('testing.adminPeriode.create_periode', compact('periode'));
    }

    public function CreatePeriode(Request $requset){
        // $superAdmin = Auth::user();
        $validateData = $requset->validate([
            'nama_periode' => 'required',
            'tipe_periode' => 'required',
            'masa_periode_awal' => 'required|date',
            'masa_periode_akhir' => 'required|date'
        ]);

        $periode = Periode::create([
            'nama_periode' => $validateData['nama_periode'],
            'tipe_periode' => $validateData['tipe_periode'],
            'masa_periode_awal' => $validateData['masa_periode_awal'],
            'masa_periode_berakhir' => $validateData['masa_periode_akhir']
        ]);

        return redirect()->back()->with('success', 'Periode telah dibuat');
    }

    public function editPeriode($id){
        $periode = Periode::findOrFail($id);

        return view('testing.adminPeriode.edit_periode', compact('periode'));
    }

    public function updatePeriode(Request $request, $id){
        $periode = Periode::findOrFail($id);

        $validatedData = $request->validate([
            'nama_periode' => 'required|string|max:255',
            'tipe_periode' => 'required|boolean', // Ensures it is a boolean value
            'masa_periode_awal' => 'required|date',
            'masa_periode_berakhir' => 'required|date|after_or_equal:masa_periode_awal', // Ensure the end date is after the start date
            'status' => 'required|boolean' // Ensure status is required and boolean
        ]);

        $periode->update([
            'nama_periode' => $validatedData['nama_periode'],
            'tipe_periode' => $validatedData['tipe_periode'],
            'masa_periode_awal' => $validatedData['masa_periode_awal'],
            'masa_periode_berakhir' => $validatedData['masa_periode_berakhir'],
            'status' => $validatedData['status'] // Update the status field
        ]);

       return redirect()->route('index.periode')->with('success', 'Periode berhasil diperbarui');
    }


    public function indexUniv(){
        $univ = Universitas::all();
        $kota = Kota::all();

        return view('testing.adminUniv.create_univ', compact('univ', 'kota'));
    }

    public function createUniv(Request $request){
        $validateData = $request->validate([
            'nama_univ' => 'required',
            'id_kota' => 'required',
        ]);

        $univ = Universitas::create([
            'nama_universitas' => $validateData['nama_univ'],
            'id_kota' => $validateData['id_kota']
        ]);

        return redirect()->back()->with('success', 'Universitas Berhasil Ditambahkan');
    }

    public function editUniv(Request $request, $id){
        $univ = Universitas::findOrFail($id);
        $kota = Kota::all();

        return view('testing.adminUniv.edit_univ', compact('univ', 'kota'));
    }

    public function updateUniv(Request $request, $id){
        $univ = Universitas::findOrFail($id);

        $validateData = $request->validate([
            'nama_universitas' => 'required',
            'id_kota' => 'required',
            'status' => 'required|boolean'
        ]);

        $univ->update($validateData);
        
        return redirect()->route('index.uni')->with('success', 'Universitas berhasil diubah');
    }

    public function indexProdi(){
        $prodi = Prodi::all();

        return view('testing.adminUniv.create_prodi', compact('prodi'));
    }

    public function createProdi(Request $request){
        $validateData = $request->validate([
            'nama_prodi' => 'required',
        ]);

        $prodi = Prodi::create([
            'nama_prodi' => $validateData['nama_prodi']
        ]);

        return redirect()->back()->with('success', "Prodi berhasil dibuat");
    }

    public function editProdi(Request $request, $id){
        $prodi = Prodi::findOrFail($id);

        return view('testing.adminUniv.edit_prodi', compact('prodi'));
    }

    public function updateProdi(Request $request, $id){
        $prodi = Prodi::findOrFail($id);

        $validateData = $request->validate([
            'nama_prodi' => 'required',
            'status' => 'required'
        ]);

        $prodi->update($validateData);

        return redirect()->route('index.prodi')->with('success', 'Prodi berhasil diubah');
    }

    public function indexPangkatDosen(){
        $pangkat_dosen = Pangkat_Dosen::all();

        return view('testing.adminPangkat.createPangkat', compact('pangkat_dosen'));
    }

    public function createPangkat(Request $request){
        $validateData = $request->validate([
            'nama_pangkat' => 'required'
        ]);

        $pdos = Pangkat_Dosen::create([
            'nama_pangkat' => $validateData['nama_pangkat']
        ]);

        return redirect()->back()->with('success', 'Pangkat berhasil dibuat');
    }

    public function editPangkat(Request $request, $id){
        $pangkat_dosen = Pangkat_Dosen::findOrFail($id);

        return view('testing.adminPangkat.editPangkat', compact('pangkat_dosen'));        
    }

    public function updatePangkat(Request $request, $id){
        $pdos = Pangkat_Dosen::findOrFail($id);

        $validateData = $request->validate([
            'nama_pangkat' => 'required'
        ]);

        $pdos->update($validateData);
        return redirect()->route('index.pangkat')->with('success', 'Pangkat berhasil diubah');
    }
}