<?php

namespace App\Http\Controllers;

use App\Models\Gelar_Belakang;
use App\Models\Gelar_Depan;
use App\Models\Jabatan_Fungsional;
use App\Models\Pangkat_Dosen;
use App\Models\Kota;
use App\Models\Periode;
use App\Models\Role;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Universitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{
    // public function index()
    // {
    //     $admin = User::all();
    //     return view('testing.admin.index', compact('admin'));
    // }

    public function index()
    {
        $admin = User::all();
        return view('home.anggota.dosen.data_dosen', compact('admin'));
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

    // public function create()
    // {
    //     $roles = Role::all();
    //     $jabatanFungsional = Jabatan_Fungsional::all();
    //     $universitas = Universitas::all();
    //     $prodi = Prodi::all();
    //     $pangkatDosen = Pangkat_Dosen::all();
    //     $gelarDepan = Gelar_Depan::all();
    //     $gelarBelakang = Gelar_Belakang::all();

    //     return view('home.anggota.dosen.pendaftaran_dosen', compact('roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    // } ///view page pendaftaran dosen

    // public function create()
    // {
    //     $roles = Role::all();
    //     $jabatanFungsional = Jabatan_Fungsional::all();
    //     $universitas = Universitas::all();
    //     $prodi = Prodi::all();
    //     $pangkatDosen = Pangkat_Dosen::all();
    //     $gelarDepan = Gelar_Depan::all();
    //     $gelarBelakang = Gelar_Belakang::all();

    //     return view('home.anggota.operator.pendaftaran_oppt', compact('roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    // } ///view page pendaftaran Operator

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

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     $roles = Role::all();
    //     $jabatanFungsional = Jabatan_Fungsional::all();
    //     $universitas = Universitas::all();
    //     $prodi = Prodi::all();
    //     $pangkatDosen = Pangkat_Dosen::all();
    //     $gelarDepan = Gelar_Depan::all();
    //     $gelarBelakang = Gelar_Belakang::all();

    //     return view('testing.admin.edit', compact('user', 'roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    // }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     $roles = Role::all();
    //     $jabatanFungsional = Jabatan_Fungsional::all();
    //     $universitas = Universitas::all();
    //     $prodi = Prodi::all();
    //     $pangkatDosen = Pangkat_Dosen::all();
    //     $gelarDepan = Gelar_Depan::all();
    //     $gelarBelakang = Gelar_Belakang::all();

    //     return view('home.anggota.lldikti.edit_lldikti', compact('user', 'roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    // } /////return view edit admin lldikti

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

        return view('home.anggota.operator.edit_operator', compact('user', 'roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    } /////return view edit operator pt

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


    public function indexPeriode(){
        $periode = Periode::all();

        return view('home.tunjangan.komponen.buat_periode', compact('periode'));
    }

    // public function indexPeriode(){
    //     $periode = Periode::all();

    //     return view('testing.adminPeriode.create_periode', compact('periode'));
    // }


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

        return view('home.tunjangan.komponen.edit_periode', compact('periode'));
    }

    // public function editPeriode($id){
    //     $periode = Periode::findOrFail($id);

    //     return view('testing.adminPeriode.edit_periode', compact('periode'));
    // }

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

        return view('home.anggota.komponen.buat_univ', compact('univ', 'kota'));
    }

    // public function indexUniv(){
    //     $univ = Universitas::all();
    //     $kota = Kota::all();

    //     return view('testing.adminUniv.create_univ', compact('univ', 'kota'));
    // }

    public function createUniv(Request $request){
        $validateData = $request->validate([
            'nama_univ' => 'required',
            'id_kota' => 'required',
            'tipe' => 'required',
        ]);

        Universitas::create([
            'nama_universitas' => $validateData['nama_univ'],
            'id_kota' => $validateData['id_kota'],
            'tipe' => $validateData['tipe'],
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
            'tipe' => 'required|in:pemerintahan,lldikti,universitas',
            'status' => 'required|boolean',
        ]);

        $univ->update($validateData);

        return redirect()->route('univ.index')->with('success', 'Universitas berhasil diubah');
    }

    public function indexProdi(){
        $prodi = Prodi::all();

        return view('home.anggota.komponen.buat_prodi', compact('prodi'));
    }

    // public function indexProdi(){
    //     $prodi = Prodi::all();

    //     return view('testing.adminUniv.create_prodi', compact('prodi'));
    // }

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

        return view('home.anggota.komponen.buat_pangkat', compact('pangkat_dosen'));
    }

    // public function indexPangkatDosen(){
    //     $pangkat_dosen = Pangkat_Dosen::all();

    //     return view('testing.adminPangkat.createPangkat', compact('pangkat_dosen'));
    // }

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