<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Jabatan_Fungsional;
use App\Models\Pangkat_Dosen;
use App\Models\Kota;
use App\Models\Periode;
use App\Models\Role;
use App\Models\User;
use App\Models\Universitas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('home.anggota.all_user.data_all_user', compact('admin'));
    }

    public function allLldikti(){
        $lldikti = User::whereIn('id_role', [2 , 3 , 4])->get();
        return view('home.anggota.lldikti.data_admin', ['lldikti' => $lldikti]);
    }

    public function allOperator(){
        $operator = User::whereIn('id_role', [7])->get();
        return view('home.anggota.operator.data_oppt', ['operator' => $operator]);
    }

    public function createOperator(){
        $universitas = Universitas::all();
        return view('home.anggota.operator.pendaftaran_oppt', ['universitas' => $universitas]);
    }

    public function allAuditor(){
        $auditor = User::whereIn('id_role', [6])->get();
        return view('home.anggota.auditor.data_auditor', ['auditor' => $auditor]);
    }

    public function createAuditor() {
        $univer = Universitas::where('tipe', 'pemerintahan')->get();
        //return response()->json(['univer' => $univer]);
        return view('home.anggota.auditor.pendaftaran_auditor', ['univer' => $univer]);
    }

    public function createDosen(){
        $admin = Auth::user();

        if ($admin) {

            if (in_array($admin->id_role, [1, 2, 3, 4])) {
                $univ = Universitas::all();
            } elseif ($admin->id_role == 7) {
                $univ = Universitas::where('id_universitas', $admin->id_universitas)->get();
            }

            $roles = Role::all();
            $jabatanFungsional = Jabatan_Fungsional::all();
            $universitas = $univ;
            $pangkatDosen = Pangkat_Dosen::all();

            return view('home.anggota.dosen.pendaftaran_dosen', compact(
                'roles',
                'jabatanFungsional',
                'universitas',
                'pangkatDosen',
            ));
        }

        return view('home.anggota.dosen.pendaftaran_dosen', compact('roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    }

    public function storeDosen(Request $request)
    {

        try {
            $request->validate([
                'id_role' => 'nullable|exists:role,id_role',
                'id_jabatan_fungsional' => 'nullable|exists:jabatan_fungsional,id_jabatan_fungsional',
                'id_universitas' => 'nullable|exists:universitas,id_universitas',
                'id_pangkat_dosen' => 'nullable|exists:pangkat_dosen,id_pangkat_dosen',
                'id_gapok' => 'nullable|exists:gapok,id_gapok',
                'gelar_depan' => 'nullable|string',
                'gelar_belakang' => 'nullable|string',
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'tanggal_lahir' => 'nullable|date',
                'tempat_lahir' => 'nullable|string|max:255',
                'masa_kerja' => 'nullable|string',
                'awal_belajar' => 'nullable|date',
                'akhir_belajar' => 'nullable|date',
                'no_rek' => 'nullable|string',
                'nama_rekening' => 'nullable|string',
                'npwp' => 'nullable|string',
                'nidn' => 'nullable|string',
                'tipe_dosen' => 'nullable|in:pns-gb,pns-profesi,non-gb,non-profesi',
                'file_serdos' => 'nullable|mimes:pdf|max:2048',
                'no_serdos' => 'nullable|string',
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
                'id_role' => 5,
                'id_jabatan_fungsional' => $request->id_jabatan_fungsional,
                'id_universitas' => $request->id_universitas,
                'id_pangkat_dosen' => $request->id_pangkat_dosen,
                'id_gapok'=> $request->id_gapok,
                'gelar_depan' => $request->gelar_depan,
                'gelar_belakang' => $request->gelar_belakang,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'masa_kerja' => $request->masa_kerja,
                'awal_belajar' => $request->awal_belajar,
                'akhir_belajar' => $request->akhir_belajar,
                'no_rek' => $request->no_rek,
                'nama_rekening' => $request->nama_rekening,
                'npwp' => $request->npwp,
                'nidn' => $request->nidn,
                'tipe_dosen' => $request->tipe_dosen,
                'file_serdos' => $serdosFileName,
                'no_serdos' => $request->no_serdos,
                'status' => $request->status ?? 'aktif',
                'image' => $fileName,
            ]);

            return redirect()->back()->with('success', 'success allhamdulilah');
        } catch (\Throwable $th) {
            return response()->json(['err'=> $th->getMessage()]);
        }
    }


    public function create()
    {
        $roles = Role::all();
        $jabatanFungsional = Jabatan_Fungsional::all();
        $universitas = Universitas::all();
        $pangkatDosen = Pangkat_Dosen::all();
        return view('home.anggota.all_user.pendaftaran_all_user', compact('roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
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

    //     return view('testing.admin.create', compact('roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    // }

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

    public function createAdminLldikti()
    {
        $roles = Role::whereIn('id_role', [2,3,4])->get();
        $jabatanFungsional = Jabatan_Fungsional::all();
        $universitas = Universitas::all();
        $pangkatDosen = Pangkat_Dosen::all();

        return view('home.anggota.lldikti.pendaftaran_lldikti', compact('roles', 'jabatanFungsional', 'universitas', 'pangkatDosen'));
    }


    ///view page pendaftaran Operator

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_role' => 'nullable|exists:role,id_role',
                'id_jabatan_fungsional' => 'nullable|exists:jabatan_fungsional,id_jabatan_fungsional',
                'id_universitas' => 'nullable|exists:universitas,id_universitas',
                'id_pangkat_dosen' => 'nullable|exists:pangkat_dosen,id_pangkat_dosen',
                'gelar_depan' => 'nullable|string',
                'gelar_belakang' => 'nullable|string',
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
                'id_pangkat_dosen' => $request->id_pangkat_dosen,
                'gelar_depan' => $request->gelar_depan,
                'gelar_belakang' => $request->gelar_belakang,
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

            return redirect()->back()->with('success', 'success allhamdulilah');
        } catch (\Throwable $th) {
            return response()->json(['err'=> $th->getMessage()]);
        }
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
        $pangkatDosen = Pangkat_Dosen::all();

        return view('home.anggota.dosen.edit_dosen', compact('user', 'roles', 'jabatanFungsional', 'universitas', 'pangkatDosen',));
    } /////return view edit dosen superadmin, admin

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

    //     return view('home.anggota.operator.edit_operator', compact('user', 'roles', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang'));
    // } /////return view edit operator pt

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_role' => 'required|exists:role,id_role',
            'id_jabatan_fungsional' => 'required|exists:jabatan_fungsional,id_jabatan_fungsional',
            'id_universitas' => 'required|exists:universitas,id_universitas',
            'id_pangkat_dosen' => 'required|exists:pangkat_dosen,id_pangkat_dosen',
            'gelar_depan' => 'nullable|string',
            'gelar_belakang' => 'nullable|string',
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
        $user->id_pangkat_dosen = $request->id_pangkat_dosen;
        $user->gelar_depan = $request->gelar_depan;
        $user->gelar_belakang = $request->gelar_belakang;
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

    public function indexPeriode(Request $request)
    {
        $periodes = Periode::orderBy('created_at', 'desc')->paginate(4);

        foreach ($periodes as $periode) {
            if (Carbon::now()->greaterThan($periode->masa_periode_berakhir)) {
                $periode->status = false;
                $periode->save();
            }
        }
        if ($request->ajax()) {
            return response()->json([
                'html' => view('home.tunjangan.komponen.pagination_periode', compact('periodes'))->render(),
                'pagination' => $periodes->links()->render(),
            ]);
        }

        return view('home.tunjangan.komponen.buat_periode', compact('periodes'));
    }



    // public function indexPeriode(Request $request)
    // {
    //     $search = $request->input('search');
    //     $statusFilter = $request->input('status');
    //     $periodes = Periode::when($search, function ($query) use ($search) {
    //         return $query->where('nama_periode', 'like', "%{$search}%");
    //     })
    //     ->when(isset($statusFilter) && ($statusFilter === '0' || $statusFilter === '1'), function ($query) use ($statusFilter) {
    //         return $query->where('status', $statusFilter);
    //     })
    //     ->orderBy('created_at', 'desc')
    //     ->paginate(2);

    //     foreach ($periodes as $periode) {
    //         if (Carbon::now()->greaterThan($periode->masa_periode_berakhir)) {

    //             $periode->status = false;
    //             $periode->save();
    //         }
    //     }

    //     if ($request->ajax()) {
    //         if ($periodes->isEmpty()) {

    //             return response()->json(['html' => view('home.anggota.komponen.data_kosong')->render()]);
    //         } else {

    //             return response()->json(['html' => view('home.tunjangan.komponen.pagination_periode', compact('periodes'))->render()]);
    //         }
    //     }

    //     return view('home.tunjangan.komponen.buat_periode', compact('periodes'));
    // }

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

        // $periode->update([
        //     'nama_periode' => $validatedData['nama_periode'],
        //     'tipe_periode' => $validatedData['tipe_periode'],
        //     'masa_periode_awal' => $validatedData['masa_periode_awal'],
        //     'masa_periode_berakhir' => $validatedData['masa_periode_berakhir'],
        //     'status' => $validatedData['status'] // Update the status field
        // ]);

        $periode = Periode::find($id);
        $periode->update($request->all());

        return response()->json(['success' => true]);

    //    return redirect()->route('index.periode')->with('success', 'Periode berhasil diperbarui');
    }


    public function indexUniv(Request $request) {
        $search = $request->input('search');
        $statusFilter = $request->input('status');

        $univ = Universitas::with('kota')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_universitas', 'like', "%{$search}%")
                    ->orWhereHas('kota', function ($query) use ($search) {
                        $query->where('nama_kota', 'like', "%{$search}%");
                    })
                    ->orWhere('tipe', 'like', "%{$search}%");
            })
            ->when(isset($statusFilter) && ($statusFilter === '0' || $statusFilter === '1'), function ($query) use ($statusFilter) {
                $query->where('status', $statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $kota = Kota::all();

        if ($request->ajax()) {
            if ($univ->isEmpty()) {

                return response()->json(['html' => view('home.anggota.komponen.data_kosong')->render()]);
            } else {

                return response()->json(['html' => view('home.anggota.komponen.pagination_univ', compact('univ'))->render()]);
            }
        }

        return view('home.anggota.komponen.buat_univ', compact('univ', 'kota'));
    }

    // public function indexUniv(){
    //     $univ = Universitas::all();
    //     $kota = Kota::all();

    //     return view('testing.adminUniv.create_univ', compact('univ', 'kota'));
    // }

    public function createUniv(Request $request){
        $validateData = $request->validate([
            'nama_universitas' => 'required',
            'id_kota' => 'required',
            'tipe' => 'required',
        ]);

        Universitas::create([
            'nama_universitas' => $validateData['nama_universitas'],
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

    public function updateUniv(Request $request, $id)
    {
        try {
            $univ = Universitas::findOrFail($id);

            $request->validate([
                'nama_universitas' => 'nullable',
                'id_kota' => 'nullable',
                'tipe' => 'nullable|in:pemerintahan,lldikti,universitas',
                'status' => 'nullable|boolean',
            ]);

            $univ->nama_universitas = $request->nama_universitas;
            $univ->id_kota = $request->id_kota;
            $univ->tipe = $request->tipe;
            $univ->status = $request->status;
            $univ->save();

            return response()->json([
                'id_universitas' => $univ->id_universitas,
                'nama_universitas' => $univ->nama_universitas,
                'id_kota' => $univ->id_kota,
                'tipe' => $univ->tipe,
                'status' => $univ->status ? 'Active' : 'Inactive',
                'nama_kota' => $univ->kota ? $univ->kota->nama_kota : 'N/A'
            ]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }



    // public function indexProdi(){
    //     $prodi = Prodi::paginate(10);

    //     return view('home.anggota.komponen.buat_prodi', compact('prodi'));
    // }

    // public function indexProdi(){
    //     $prodi = Prodi::all();

    //     return view('testing.adminUniv.create_prodi', compact('prodi'));
    // }

    // public function createProdi(Request $request){
    //     $validateData = $request->validate([
    //         'nama_prodi' => 'required',
    //     ]);

    //     $prodi = Prodi::create([
    //         'nama_prodi' => $validateData['nama_prodi']
    //     ]);

    //     return redirect()->back()->with('success', "Prodi berhasil dibuat");
    // }

    // public function editProdi(Request $request, $id){
    //     $prodi = Prodi::findOrFail($id);

    //     return view('testing.adminUniv.edit_prodi', compact('prodi'));
    // }

    // public function updateProdi(Request $request, $id){
    //     $prodi = Prodi::findOrFail($id);

    //     $validateData = $request->validate([
    //         'nama_prodi' => 'required',
    //         'status' => 'required'
    //     ]);

    //     $prodi->update($validateData);

    //     return redirect()->route('index.prodi')->with('success', 'Prodi berhasil diubah');
    // }


    public function indexBank(Request $request){
        $statusFilter = $request->input('status');

        $bank = Bank::
            when(isset($statusFilter) && ($statusFilter === '0' || $statusFilter === '1'), function ($query) use ($statusFilter) {
                $query->where('status', $statusFilter);
            })
            ->paginate(10);

        if ($request->ajax()) {
            if ($bank->isEmpty()) {

                return response()->json(['html' => view('home.anggota.komponen.data_kosong')->render()]);
            } else {

                return response()->json(['html' => view('home.anggota.komponen.pagination_bank', compact('bank'))->render()]);
            }
        }

        return view('home.anggota.komponen.buat_bank', compact('bank'));
    }

    public function createBank(Request $request){
        $validateData = $request->validate([
            'nama_bank' => 'required',
        ]);

        $bank = Bank::create([
            'nama_bank' => $validateData['nama_bank']
        ]);

        return redirect()->back()->with('success', "Bank berhasil dibuat");
    }

    public function editBank(Request $request, $id){
        $bank = Bank::findOrFail($id);

        // return view('testing.adminUniv.edit_prodi', compact('bank'));
    }

    public function updateBank(Request $request, $id){
        $bank = Bank::findOrFail($id);

        $validateData = $request->validate([
            'nama_bank' => 'required',
            'status' => 'required'
        ]);

        $bank->update($validateData);

        return redirect()->route('index.bank')->with('success', 'Bank berhasil diubah');
    }

    public function indexPangkatDosen(){
        $pangkat_dosen = Pangkat_Dosen::paginate(5);

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