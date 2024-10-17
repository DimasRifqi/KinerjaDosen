<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Gelar_Belakang;
use App\Models\Gelar_Depan;
use App\Models\Jabatan_Fungsional;
use App\Models\Pangkat_Dosen;
use App\Models\Permohonan;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\Universitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    public function indexPermohonanOppt()
{
    $oppt = Auth::user();

    // Mengambil data permohonan dengan id_user yang id_universitas-nya sama dengan oppt
    $permohonan = Permohonan::whereHas('user', function($query) use ($oppt) {
        $query->where('id_universitas', $oppt->id_universitas);
    })->orderBy('id_permohonan', 'DESC')
    ->get();

    return view('testing.permohonan_baru.index_permohonan_oppt', ['permohonan' => $permohonan]);
}


    public function indexPermohonanAdmin(){
        $permohonan = Permohonan::orderBy('created_at', 'desc')->get();
        //return response()->json(['permohonan' => $permohonan]);
        return view('testing.permohonan_baru.index_permohonan_admin', ['permohonan' => $permohonan]);
    }

    public function createPermohonanOppt()
    {
        $oppt = Auth::user();
        $jabatanFungsional = Jabatan_Fungsional::all();
        $universitas = Universitas::all();
        $prodi = Prodi::all();
        $pangkatDosen = Pangkat_Dosen::all();
        $gelarDepan = Gelar_Depan::all();
        $gelarBelakang = Gelar_Belakang::all();
        $bank = Bank::all();
        $dosen = User::where('id_universitas', $oppt->id_universitas)->get();

        return view('testing.permohonan_baru.create_permohonan', compact('dosen', 'jabatanFungsional', 'universitas', 'prodi', 'pangkatDosen', 'gelarDepan', 'gelarBelakang', 'bank'));
    }

    public function storePermohonanOppt(Request $request){

        try {
            $request->validate([
                'id' => 'nullable',
                'id_bank_baru' => 'nullable',
                'id_jabatan_fungsional_baru' => 'nullable|exists:jabatan_fungsional,id_jabatan_fungsional',
                'id_universitas_baru' => 'nullable|exists:universitas,id_universitas',
                'id_prodi_baru' => 'nullable|exists:prodi,id_prodi',
                'id_pangkat_dosen_baru' => 'nullable|exists:pangkat_dosen,id_pangkat_dosen',
                'id_gelar_depan_baru' => 'nullable|exists:gelar_depan,id_gelar_depan',
                'id_gelar_belakang_baru' => 'nullable|exists:gelar_belakang,id_gelar_belakang',
                'name_baru' => 'nullable|string|max:255',
                'email_baru' => 'nullable|email|unique:users,email',
                'password_baru' => 'nullable|string|min:8|confirmed',
                'tanggal_lahir_baru' => 'nullable|date',
                'tempat_lahir_baru' => 'nullable|string|max:255',
                'no_rek_baru' => 'nullable|string',
                'npwp_baru' => 'nullable|string',
                'nidn_baru' => 'nullable|string',
                'file_serdos_baru' => 'nullable|mimes:pdf|max:2048',
                'status_baru' => 'nullable|in:aktif,non-aktif,pensiun,belajar',
                'image_baru' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'permohonan' => 'nullable|string',
                'awal_kerja_baru' => 'nullable',
                'nama_rekening_baru' => 'nullable',
                'lampiran_permohonan' => 'nullable|mimes:pdf|max:10048',

            ]);


            if ($request->hasFile('image_baru')) {
                $fileName = $request->file('image_baru')->store('images/dosen', 'public');
            } else {
                $fileName = null;
            }

            if ($request->hasFile('file_serdos_baru')) {
                $serdosFileName = $request->file('file_serdos_baru')->store('files/serdos', 'public');
            } else {
                $serdosFileName = null;
            }

            if ($request->hasFile('lampiran_permohonan')) {
                $lampiranFile = $request->file('lampiran_permohonan')->store('files/lampiran_permohonan', 'public');
            } else {
                $lampiranFile = null;
            }

            Permohonan::create([
                'id' => $request->id,
                'id_role_baru' => 5,
                'id_bank_baru' => $request->id_bank_baru,
                'id_jabatan_fungsional_baru' => $request->id_jabatan_fungsional_baru,
                'id_universitas_baru' => $request->id_universitas_baru,
                'id_prodi_baru' => $request->id_prodi_baru,
                'id_pangkat_dosen_baru' => $request->id_pangkat_dosen_baru,
                'id_gelar_depan_baru' => $request->id_gelar_depan_baru,
                'id_gelar_belakang_baru' => $request->id_gelar_belakang_baru,
                'name_baru' => $request->name_baru,
                'email_baru' => $request->email_baru,
                'password_baru' => bcrypt($request->password_baru),
                'tanggal_lahir_baru' => $request->tanggal_lahir_baru,
                'tempat_lahir_baru' => $request->tempat_lahir_baru,
                'no_rek_baru' => $request->no_rek_baru,
                'npwp_baru' => $request->npwp_baru,
                'nidn_baru' => $request->nidn_baru,
                'file_serdos_baru' => $serdosFileName,
                'status_baru' => $request->status_baru ?? 'aktif',
                'image_baru' => $fileName,
                'permohonan' => $request->permohonan,
                'awal_kerja_baru' => $request->awal_kerja_baru,
                'nama_rekening_baru' => $request->nama_rekening_baru,
                'lampiran_permohonan' => $lampiranFile
            ]);

            return redirect()->back()->with('success', 'success allhamdulilah');
        } catch (\Throwable $th) {
            return response()->json(['err'=> $th->getMessage()]);
        }
    }

    public function detailPermohonanAdmin($id){
        $permohonan = Permohonan::findOrFail($id);
        return view('testing.permohonan_baru.detail_permohonan_admin', ['permohonan' => $permohonan]);
    }

    public function updatePermohonanAdmin($id, Request $request)
{
    $permohonan = Permohonan::findOrFail($id);

    $dosen = User::findOrFail($permohonan->id);

    if ($permohonan->file_serdos_baru) {

        $serdosFileName = $permohonan->file_serdos_baru;
    } else {

        $serdosFileName = $dosen->file_serdos ?? null;
    }


    if ($permohonan->image_baru) {

        $fileName = $permohonan->image_baru;

    } else {

        $fileName = $dosen->image ?? null;
    }


    $dosen->update([
        'id_role' => 5,
        'id_bank_baru' => $permohonan->id_bank_baru ?? $dosen->id_bank,
        'id_jabatan_fungsional' => $permohonan->id_jabatan_fungsional_baru ?? $dosen->id_jabatan_fungsional,
        'id_universitas' => $permohonan->id_universitas_baru ?? $dosen->id_universitas,
        'id_prodi' => $permohonan->id_prodi_baru ?? $dosen->id_prodi,
        'id_pangkat_dosen' => $permohonan->id_pangkat_dosen_baru ?? $dosen->id_pangkat_dosen,
        'id_gelar_depan' => $permohonan->id_gelar_depan_baru ?? $dosen->id_gelar_depan,
        'id_gelar_belakang' => $permohonan->id_gelar_belakang_baru ?? $dosen->id_gelar_belakang,
        'name' => $permohonan->name_baru ?? $dosen->name,
        'email' => $permohonan->email_baru ?? $dosen->email,
        'password' => bcrypt($permohonan->password_baru) ?? bcrypt($dosen->password),
        'tanggal_lahir' => $permohonan->tanggal_lahir_baru ?? $dosen->tanggal_lahir,
        'tempat_lahir' => $permohonan->tempat_lahir_baru ?? $dosen->tempat_lahir,
        'no_rek' => $permohonan->no_rek_baru ?? $dosen->no_rek,
        'npwp' => $permohonan->npwp_baru ?? $dosen->npwp,
        'nidn' => $permohonan->nidn_baru ?? $dosen->nidn,
        'file_serdos' => $serdosFileName ?? $dosen->file_serdos,
        'status' => $permohonan->status_baru ?? $dosen->status,
        'image' => $fileName ?? $dosen->image,
        'awal_kerja' => $permohonan->awal_kerja_baru ?? $dosen->awal_kerja,
        'nama_rekening' => $permohonan->nama_rekening_baru ?? $dosen->nama_rekening,
    ]);

    $permohonan->update([
        'pesan_admin' => $request->pesan_admin,
        'status_permohonan' => 'disetujui'
    ]);

    return redirect()->back()->with('success', 'Data dosen berhasil diperbarui.');
}

    public function tolakPermohonanAdmin(Request $request, $id){
        $permohonan = Permohonan::findOrFail($id);

        $permohonan->update([
            'pesan_admin' => $request->pesan_admin,
            'status_permohonan' => 'ditolak'
        ]);

        return redirect()->back()->with('success', 'Permohonan ditolak');
    }

    public function deletePermohonan($id){
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->delete();

        return redirect()->back()->with('succes', 'Berhasil menghapus permohonan');
    }

}


