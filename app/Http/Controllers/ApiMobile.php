<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Informasi;
use App\Models\Kota;
use App\Models\Pengajuan_User;
use App\Models\Prodi;
use App\Models\Universitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ApiMobile extends Controller
{
    public function indexInformasi(){
        try {
            $informasi = Informasi::all();
            return response()->json(['data' => $informasi, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function pengajuanTerbaruUser(){
        try {
            $dosenId = Auth::id();
            $pengajuan = Pengajuan_User::with('pengajuan.periode', 'pengajuan.pengajuan_dokumen')->where('id', $dosenId)->first();
            return response()->json(['data' => $pengajuan, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function faqIndex(){
        try {
            $faq = Faq::all();
            return response()->json(['data' => $faq, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function pengajuanIndexUser(){
        try {
            $dosenId = Auth::id();
            $pengajuan = Pengajuan_User::where('id', $dosenId)->get();
            return response()->json(['data' => $pengajuan, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function pengajuanIndexShow($id){
        try {
            $dosenId = Auth::id();
            $pengajuan = Pengajuan_User::where('id', $dosenId)->findOrFail($id);
            return response()->json(['data' => $pengajuan, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function allKota(){
        try {
            $kota = Kota::all();
            return response()->json(['data' => $kota, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function allUniv(){
        try {
            $univ = Universitas::all();
            return response()->json(['data' => $univ, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function allProdi(){
        try {
            $prodi = Prodi::all();
            return response()->json(['data' => $prodi, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function allDosen(){
        try {
            $dosen = User::where('id_role', 5)->get();
            return response()->json(['data' => $dosen, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function ajuanTunjanganDosen(){
        try {
            $dosen = User::with('gelar_depan', 'gelar_belakang', 'jabatan_fungsional', 'universitas', 'pangkat_dosen', 'prodi')->where('id_role', 5)->get();
            return response()->json(['data' => $dosen, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function ajuanTunjanganDosenShow($id){
        try {
            $dosen = User::with('gelar_depan', 'gelar_belakang', 'jabatan_fungsional', 'universitas', 'pangkat_dosen', 'prodi')->where('id_role', 5)->findOrFail($id);
            return response()->json(['data' => $dosen, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function riwayatTunjangan(){
        try {
            $dosenId = Auth::id();
            $pengajuan = Pengajuan_User::with('pengajuan')->where('id', $dosenId)->get();
            return response()->json(['data' => $pengajuan, 'status' =>200]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' =>500]);
        }
    }

    public function gantiPassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        $user = Auth::user();


        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'message' => 'Password lama salah.',
            ], 400);
        }


        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json([
            'message' => 'Password berhasil diganti.',
        ], 200);
    }


    public function gantiImage(Request $request)
    {
        $user = Auth::user();
        $dosen = User::findOrFail($user->id);

        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Maks ukuran 2MB
            ]);


            if ($request->hasFile('image')) {

                $imagePath = $request->file('image')->store('images/dosen', 'public');

                if ($dosen->image) {
                    Storage::disk('public')->delete($dosen->image);
                }

                $dosen->image = $imagePath;
                $dosen->save();

                return response()->json(['data' => $dosen->image, 'status' => 200]);
            } else {
                return response()->json(['err' => 'No image uploaded', 'status' => 400]);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['err' => $e->errors(), 'status' => 422]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage(), 'status' => 500]);
        }
    }





}
