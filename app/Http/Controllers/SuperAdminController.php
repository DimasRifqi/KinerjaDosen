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
use Illuminate\Support\Facades\Storage;

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

        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = 'image-' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/img/foto_users'), $fileName);
        }

        $serdosFileName = $request->file_serdos ? 'serdos-' . uniqid() . '.' . $request->file_serdos->extension() : null;
        if ($serdosFileName) {
            $request->file_serdos->move(public_path('storage/file/file_serdos'), $serdosFileName);
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
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $jabatanFungsional = Jabatan_Fungsional::all();
        $universitas = Universitas::all();
        $prodi = Prodi::all();
        $pangkatDosen = Pangkat_Dosen::all();
        $gelarDepan = Gelar_Depan::all();
        $gelarBelakang = Gelar_Belakang::all();

        return view('testing.admin.edit', compact('user', 'roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_role' => 'required|exists:role,id_role',
            'id_jabatan_fungsional' => 'required|exists:jabatan_fungsional,id_jabatan_fungsional',
            'id_universitas' => 'required|exists:universitas,id_universitas',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'id_pangkat_dosen' => 'required|exists:pangkat_dosen,id_pangkat_dosen',
            'id_gelar_depan' => 'nullable|exists:gelar_depan,id_gelar_depan',
            'id_gelar_belakang' => 'nullable|exists:gelar_belakang,id_gelar_belakang',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'no_rek' => 'nullable|string',
            'npwp' => 'nullable|string',
            'nidn' => 'nullable|string',
            'file_serdos' => 'nullable|mimes:pdf|max:2048',
            'status' => 'nullable|in:aktif,non-aktif,pensiun,belajar',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete('img/foto_users/' . $user->image);
            }
            $fileName = 'image-' . uniqid() . '.' . $request->image->extension();
            $request->image->storeAs('img/foto_users', $fileName, 'public');
            $user->image = $fileName;
        }

        if ($request->hasFile('file_serdos')) {
            if ($user->file_serdos) {
                Storage::disk('public')->delete('file/file_serdos/' . $user->file_serdos);
            }
            $serdosFileName = 'serdos-' . uniqid() . '.' . $request->file_serdos->extension();
            $request->file_serdos->storeAs('file/file_serdos', $serdosFileName, 'public');
            $user->file_serdos = $serdosFileName;
        }

        $user->id_role = $request->id_role;
        $user->id_jabatan_fungsional = $request->id_jabatan_fungsional;
        $user->id_universitas = $request->id_universitas;
        $user->id_prodi = $request->id_prodi;
        $user->id_pangkat_dosen = $request->id_pangkat_dosen;
        $user->id_gelar_depan = $request->id_gelar_depan;
        $user->id_gelar_belakang = $request->id_gelar_belakang;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->no_rek = $request->no_rek;
        $user->npwp = $request->npwp;
        $user->nidn = $request->nidn;
        $user->status = $request->status ?? 'aktif';

        $user->save();

        return redirect()->route('admin.index')->with(['type' => 'success', 'message' => 'Berhasil memperbarui data.']);
    }

}
