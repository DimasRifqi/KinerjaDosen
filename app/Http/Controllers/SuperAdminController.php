<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Periode;
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
        
    }
}