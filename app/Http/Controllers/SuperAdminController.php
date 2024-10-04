<?php

namespace App\Http\Controllers;

use App\Models\Gelar_Belakang;
use App\Models\Gelar_Depan;
use App\Models\Jabatan_Fungsional;
use App\Models\Pangkat_Dosen;
use App\Models\Role;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Universitas;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $admin = User::all();
        return view('testing.admin.index', compact('admin'));
    }

    public function create()
    {
        $roles = Role::all();
        $jabatanFungsional = Jabatan_Fungsional::all();
        $universitas = Universitas::all();
        $prodi = Prodi::all();
        $pangkatDosen = Pangkat_Dosen::all();
        $gelarDepan = Gelar_Depan::all();
        $gelarBelakang = Gelar_Belakang::all();

        return view('testing.admin.create', compact('roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_role' => 'required|exists:role,id_role',
                'id_jabatan_fungsional' => 'required|exists:jabatan_fungsional,id_jabatan_fungsional',
                'id_universitas' => 'required|exists:universitas,id_universitas',
                'id_prodi' => 'required|exists:prodi,id_prodi',
                'id_pangkat_dosen' => 'required|exists:pangkat_dosen,id_pangkat_dosen',
                'id_gelar_depan' => 'nullable|exists:gelar_depan,id_gelar_depan',
                'id_gelar_belakang' => 'nullable|exists:gelar_belakang,id_gelar_belakang',
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'tanggal_lahir' => 'nullable|date',
                'tempat_lahir' => 'nullable|string|max:255',
                'no_rek' => 'nullable|string',
                'npwp' => 'nullable|string',
                'nidn' => 'nullable|string',
                'file_serdos' => 'nullable|mimes:pdf|max:2048',
                'status' => 'nullable|in:aktif,non-aktif,pensiun,belajar',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $fileName = $request->image ? 'image-' . uniqid() . '.' . $request->image->extension() : null;
            if ($fileName) {
                $request->image->move(public_path('img/foto_users'), $fileName);
            }

            $serdosFileName = $request->file_serdos ? 'serdos-' . uniqid() . '.' . $request->file_serdos->extension() : null;
            if ($serdosFileName) {
                $request->file_serdos->move(public_path('file/file_serdos'), $serdosFileName);
            }

            User::create([
                'id_role' => $request->id_role,
                'id_jabatan_fungsional' => $request->id_jabatan_fungsional,
                'id_universitas' => $request->id_universitas,
                'id_prodi' => $request->id_prodi,
                'id_pangkat_dosen' => $request->id_pangkat_dosen,
                'id_gelar_depan' => $request->id_gelar_depan,
                'id_gelar_belakang' => $request->id_gelar_belakang,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'no_rek' => $request->no_rek,
                'npwp' => $request->npwp,
                'nidn' => $request->nidn,
                'file_serdos' => $serdosFileName,
                'status' => $request->status ?? 'aktif',
                'image' => $fileName,
            ]);

            return redirect()->route('admin.index')->with(['type' => 'success', 'message' => 'Berhasil menambahkan data.']);
        } catch (\Throwable $th) {
            return response()->json(['message'=> $th]);
        }
        // $request->validate([
        //     'id_role' => 'required|exists:role,id_role',
        //     'id_jabatan_fungsional' => 'required|exists:jabatan_fungsional,id_jabatan_fungsional',
        //     'id_universitas' => 'required|exists:universitas,id_universitas',
        //     'id_prodi' => 'required|exists:prodi,id_prodi',
        //     'id_pangkat_dosen' => 'required|exists:pangkat_dosen,id_pangkat_dosen',
        //     'id_gelar_depan' => 'nullable|exists:gelar_depan,id_gelar_depan',
        //     'id_gelar_belakang' => 'nullable|exists:gelar_belakang,id_gelar_belakang',
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:8|confirmed',
        //     'tanggal_lahir' => 'nullable|date',
        //     'tempat_lahir' => 'nullable|string|max:255',
        //     'no_rek' => 'nullable|string',
        //     'npwp' => 'nullable|string',
        //     'nidn' => 'nullable|string',
        //     'file_serdos' => 'nullable|mimes:pdf|max:2048',
        //     'status' => 'nullable|in:aktif,non-aktif,pensiun,belajar',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // $fileName = $request->image ? 'image-' . uniqid() . '.' . $request->image->extension() : null;
        // if ($fileName) {
        //     $request->image->move(public_path('img/foto_users'), $fileName);
        // }

        // $serdosFileName = $request->file_serdos ? 'serdos-' . uniqid() . '.' . $request->file_serdos->extension() : null;
        // if ($serdosFileName) {
        //     $request->file_serdos->move(public_path('file/file_serdos'), $serdosFileName);
        // }

        // User::create([
        //     'id_role' => $request->id_role,
        //     'id_jabatan_fungsional' => $request->id_jabatan_fungsional,
        //     'id_universitas' => $request->id_universitas,
        //     'id_prodi' => $request->id_prodi,
        //     'id_pangkat_dosen' => $request->id_pangkat_dosen,
        //     'id_gelar_depan' => $request->id_gelar_depan,
        //     'id_gelar_belakang' => $request->id_gelar_belakang,
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'no_rek' => $request->no_rek,
        //     'npwp' => $request->npwp,
        //     'nidn' => $request->nidn,
        //     'file_serdos' => $serdosFileName,
        //     'status' => $request->status ?? 'aktif',
        //     'image' => $fileName,
        // ]);

        // return redirect()->route('admin.index')->with(['type' => 'success', 'message' => 'Berhasil menambahkan data.']);
    }




}