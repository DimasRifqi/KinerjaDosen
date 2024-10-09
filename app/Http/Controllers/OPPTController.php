<?php

namespace App\Http\Controllers;

use App\Models\Gelar_Belakang;
use App\Models\Gelar_Depan;
use App\Models\Jabatan_Fungsional;
use App\Models\Pangkat_Dosen;
use App\Models\Pengajuan;
use App\Models\Pengajuan_Dokumen;
use App\Models\Periode;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\Universitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OPPTController extends Controller
{
    public function allDosen()
    {
        $oppt = Auth::user();
        $dosen = User::all()

            // ->where('id_role', 5)
            ->where('id_universitas', $oppt->id_universitas);
        //return response()->json(['dosen' => $dosen]);
        return view('testing.oppt.index_dosen', ['dosen' => $dosen]);
    }

    public function updateStatusDosen(Request $request, $id)
    {
        $dosen = User::findOrFail($id);
        $request->validate([
            'status' => 'required|in:aktif,non-aktif,pensiun,belajar',
        ]);

        $dosen->status = $request->status;
        $dosen->save();

        return redirect()->back()->with('success', 'Status dosen berhasil diperbarui.');
    }

    public function editDosen($id)
    {
        $dosen = User::findOrFail($id);
        $gelar_depan = Gelar_Depan::all();
        $gelar_belakang = Gelar_Belakang::all();
        $jabatan_fungsional = Jabatan_Fungsional::all();
        $pangkat_dosen = Pangkat_Dosen::all();
        $universitas = Universitas::all();
        $prodi = Prodi::all();

        return view(
            'testing.oppt.edit_dosen',
            [
                'dosen' => $dosen,
                'gelar_depan' => $gelar_depan,
                'gelar_belakang' => $gelar_belakang,
                'jabatan_fungsional' => $jabatan_fungsional,
                'pangkat_dosen' => $pangkat_dosen,
                'universitas' => $universitas,
                'prodi' => $prodi
            ]
        );
    }


    public function updateDosen(Request $request, $id)
    {
        $request->validate([
            'id_gelar_depan' => 'nullable|exists:gelar_depan,id_gelar_depan',
            'id_gelar_belakang' => 'nullable|exists:gelar_belakang,id_gelar_belakang',
            'id_jabatan_fungsional' => 'nullable|exists:jabatan_fungsional,id_jabatan_fungsional',
            'id_pangkat_dosen' => 'nullable|exists:pangkat_dosen,id_pangkat_dosen',
            'id_universitas' => 'nullable|exists:universitas,id_universitas',
            'id_prodi' => 'nullable|exists:prodi,id_prodi',
            'name' => 'required|string|max:255',
            'no_rek' => 'nullable|string|max:20',
            'npwp' => 'nullable|string|max:20',
            'nidn' => 'nullable|string|max:20',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'status' => 'required|in:aktif,non-aktif,pensiun,belajar',
            'file_serdos' => 'nullable|file|mimes:pdf|max:5048', // Validasi untuk file serdos (hanya PDF)
            'image' => 'nullable|image|max:2048', // Validasi untuk image (gambar)
        ]);

        $dosen = User::findOrFail($id);

        $dosen->id_gelar_depan = $request->id_gelar_depan;
        $dosen->id_gelar_belakang = $request->id_gelar_belakang;
        $dosen->id_jabatan_fungsional = $request->id_jabatan_fungsional;
        $dosen->id_pangkat_dosen = $request->id_pangkat_dosen;
        $dosen->id_universitas = $request->id_universitas;
        $dosen->id_prodi = $request->id_prodi;
        $dosen->name = $request->name;
        $dosen->no_rek = $request->no_rek;
        $dosen->npwp = $request->npwp;
        $dosen->nidn = $request->nidn;
        $dosen->tanggal_lahir = $request->tanggal_lahir;
        $dosen->tempat_lahir = $request->tempat_lahir;
        $dosen->status = $request->status;

        if ($request->hasFile('file_serdos')) {
            $fileSerdosPath = $request->file('file_serdos')->store('files/serdos', 'public');
            if ($dosen->file_serdos) {
                Storage::disk('public')->delete($dosen->file_serdos);
            }
            $dosen->file_serdos = $fileSerdosPath;
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/dosen', 'public');
            if ($dosen->image) {
                Storage::disk('public')->delete($dosen->image);
            }
            $dosen->image = $imagePath;
        }
        $dosen->save();
        return redirect()->back();
    }

    public function indexPeriode()
    {
        $periode = Periode::all();
        return view('home.tunjangan.komponen.data_periode', ['periode' => $periode]);
    }

    // public function indexPeriode()
    // {
    //     $periode = Periode::all();
    //     return view('testing.oppt.periode', ['periode' => $periode]);
    // }

    public function addPengajuan()
    {
        $oppt = Auth::user();
        $dosen = User::all()
            ->where('id_universitas', $oppt->id_universitas);
        $periode = Periode::all();
        return view('home.tunjangan.pengajuan.buat_pengajuan', ['periodes' => $periode, 'dosen' => $dosen]);
    }

    //     public function addPengajuan()
    // {
    //     $oppt = Auth::user();
    //     $dosen = User::all()
    //     ->where('id_universitas', $oppt->id_universitas);
    //     $periode = Periode::all();
    //     return view('testing.oppt.pengajuan', ['periodes' => $periode, 'dosen' => $dosen]);
    // }

    public function indexPengajuan()
    {
        $pengajuan = Pengajuan::with('user')->get();
        return view('home.tunjangan.pengajuan.index_pengajuan', compact('pengajuan'));
    }

    //public function indexPengajuan()
    //  {
    //        $pengajuan = Pengajuan::with('user')->get();
    //      return view('testing.oppt.index_pengajuan', compact('pengajuan'));
    //  }

    public function showPengajuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $jumlahDokumen = $pengajuan->pengajuan_dokumen->count();

        //return response()->json(['JumDOk' => $jumlahDokumen]);
        return view('home.tunjangan.pengajuan.ajukan_bulanan', ['pengajuan' => $pengajuan]);
    }

    // public function showPengajuan($id)
    // {
    //     $pengajuan = Pengajuan::findOrFail($id);
    //     $jumlahDokumen = $pengajuan->pengajuan_dokumen->count();

    //     //return response()->json(['JumDOk' => $jumlahDokumen]);
    //     return view('testing.oppt.show_pengajuan', ['pengajuan' => $pengajuan]);
    // }

    public function ajukanDosen(Request $request)
    {
        try {
            $request->validate([
                'id_periode' => 'required|exists:periode,id_periode',
                'dosen_ids' => 'required|array',
            ]);

            $pengajuan = Pengajuan::create([
                'id_periode' => $request->id_periode,
            ]);

            $pengajuan->user()->attach($request->dosen_ids, [
                'status' => 'diajukan',
                'tanggal_diajukan' => now(),
            ]);

            return redirect()->route('oppt.pengajuanIndex.dosen')->with('success', 'Pengajuan berhasil dibuat!');
            //return response()->json(['Error' => 'jir']);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th]);
        }
    }



    public function ajukanDokumen(Request $request, $id)
    {
        try {
            $request->validate([
                'SPTJM' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'SPPPTS' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'SPKD' => 'required|file|mimes:pdf,jpg,jpeg,png',
            ]);

            $dokumenFiles = [
                'SPTJM' => $request->file('SPTJM'),
                'SPPPTS' => $request->file('SPPPTS'),
                'SPKD' => $request->file('SPKD'),
            ];

            $dokumenNames = ['SPTJM', 'SPPPTS', 'SPKD'];

            $pengajuan = Pengajuan::findOrFail($id);
            foreach ($dokumenFiles as $key => $file) {
                $filePath = $file->store('dokumen', 'public');

                Pengajuan_Dokumen::create([
                    'id_pengajuan' => $pengajuan->id_pengajuan,
                    'nama_dokumen' => $dokumenNames[array_search($key, array_keys($dokumenFiles))],
                    'file_dokumen' => $filePath,
                ]);
            }

            return redirect()->back()->with('success', 'Pengajuan berhasil dibuat dengan dokumen!');
        } catch (\Throwable $th) {
            return response()->json(['Message' => $th]);
        }
    }

    

    public function updateDokumen($id, Request $request)
{
    try {
        // Validasi input
        $request->validate([
            'SPTJM' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'SPPPTS' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'SPKD' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        // Inisialisasi dokumen yang diupload
        $dokumenFiles = [
            'SPTJM' => $request->file('SPTJM'),
            'SPPPTS' => $request->file('SPPPTS'),
            'SPKD' => $request->file('SPKD'),
        ];

        $dokumenNames = ['SPTJM', 'SPPPTS', 'SPKD'];

        $pengajuan = Pengajuan::findOrFail($id);

        // Loop untuk setiap dokumen yang diupload
        foreach ($dokumenFiles as $key => $file) {
            if ($file) {
                // Cari dokumen lama di database
                $existingDokumen = Pengajuan_Dokumen::where('id_pengajuan', $pengajuan->id_pengajuan)
                    ->where('nama_dokumen', $key)
                    ->first();

                // Hapus file dokumen lama jika ada
                if ($existingDokumen) {
                    Storage::disk('public')->delete($existingDokumen->file_dokumen);

                    // Update dengan file baru
                    $filePath = $file->store('dokumen', 'public');
                    $existingDokumen->update([
                        'file_dokumen' => $filePath,
                    ]);
                } else {
                    // Jika dokumen tidak ada, buat baru
                    $filePath = $file->store('dokumen', 'public');
                    Pengajuan_Dokumen::create([
                        'id_pengajuan' => $pengajuan->id_pengajuan,
                        'nama_dokumen' => $key,
                        'file_dokumen' => $filePath,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Dokumen berhasil diupdate!');
    } catch (\Throwable $th) {
        return response()->json(['Message' => $th->getMessage()]);
    }
}



    public function showPengajuanSemester($id){
        $pengajuan = Pengajuan::findOrFail($id);
        return view('home.tunjangan.pengajuan.ajukan_semester', ['pengajuan' => $pengajuan]);
    }

    // public function showPengajuanSemester($id){
    //     $pengajuan = Pengajuan::findOrFail($id);
    //     return view('testing.oppt.show_pengajuan_semester', ['pengajuan' => $pengajuan]);
    // }

    public function ajukanDokumenSemester(Request $request, $id)
    {
        try {
            $request->validate([
                'SPTJM' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'SPPPTS' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'SPKD' => 'required|file|mimes:pdf,jpg,jpeg,png',
            ]);

            $dokumenFiles = [
                'SPTJM' => $request->file('SPTJM'),
                'SPPPTS' => $request->file('SPPPTS'),
                'SPKD' => $request->file('SPKD'),
            ];

            $dokumenNames = ['SPTJM', 'SPPPTS', 'SPKD'];

            $pengajuan = Pengajuan::findOrFail($id);
            foreach ($dokumenFiles as $key => $file) {
                $filePath = $file->store('dokumen', 'public');

                Pengajuan_Dokumen::create([
                    'id_pengajuan' => $pengajuan->id_pengajuan,
                    'nama_dokumen' => $dokumenNames[array_search($key, array_keys($dokumenFiles))],
                    'file_dokumen' => $filePath,
                ]);
            }

            return redirect()->back()->with('success', 'Pengajuan berhasil dibuat dengan dokumen!');
        } catch (\Throwable $th) {
            return response()->json(['Message' => $th]);
        }
    }

    public function draftPengajuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        if ($pengajuan->draft == false) {
            $pengajuan->draft = true;
        }
        $pengajuan->save();
        return redirect()->back();
    }

    public function editPengajuan($id)
    {
        $pengajuan = Pengajuan::with('user')->findOrFail($id);
        $periode = Periode::all();
        $dosen = User::all();
        // return response()->json(['data' => $pengajuan]);
        return view('testing.oppt.edit_pengajuan_dosen', ['pengajuan' => $pengajuan, 'periode' => $periode, 'dosen' => $dosen]);
    }

    public function updatePengajuan(Request $request, $id)
    {
        try {
            // Validasi request
            $request->validate([
                'id_periode' => 'required|exists:periode,id_periode',
                'dosen_ids' => 'nullable|array',
            ]);

            // Cari pengajuan berdasarkan ID
            $pengajuan = Pengajuan::findOrFail($id);

            // Update pengajuan dengan id_periode baru
            $pengajuan->update([
                'id_periode' => $request->id_periode,
            ]);

            // Sinkronisasi dosen yang diajukan
            $pengajuan->user()->sync($request->dosen_ids, [
                'status' => 'diajukan',
                'tanggal_diajukan' => now(),
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('oppt.pengajuanIndex.dosen')->with('success', 'Pengajuan berhasil diperbarui!');
        } catch (\Throwable $th) {
            return redirect()->route('oppt.pengajuanIndex.dosen');
        }
    }

    public function deletePengajuan($id){
        try {
            $pengajuan = Pengajuan::findOrFail($id);
            $pengajuan->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
          return response()->json(['error' => $th]);
        }
    }

    public function statusPengajuanDosen($id){
        try {
            $pengajuan = Pengajuan::with('user')->findOrFail($id);
            return view('testing.oppt.index_status_pengajuan_dosen', ['pengajuan' => $pengajuan]);
            //return response()->json(['data' => $pengajuan]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }

}
