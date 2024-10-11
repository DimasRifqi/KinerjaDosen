<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Pengajuan_User;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class VerifikatorController extends Controller
{
    public function indexPengajuan(){
        $pengajuan = Pengajuan::with('user')
        ->where('draft', true)
        ->get();
      //  return response()->json(['data' => $pengajuan]);
        return view('testing.verifikator.index_pengajuan', ['pengajuan' => $pengajuan]);
    }

    public function detailPengajuan($id){
        $pengajuan = Pengajuan::with('user.universitas', 'pengajuan_dokumen')
        ->where('draft', true)
        ->findOrFail($id);
        //return response()->json(['data' => $pengajuan]);
        return view('testing.verifikator.detail_pengajuan', ['pengajuan' => $pengajuan]);
    }

    public function updateStatusPengajuan(Request $request, $userId)
{
    try {
        // Validasi status yang diinputkan
        $request->validate([
            'status' => 'required|in:diajukan,disetujui,ditolak',
        ]);

        // Cari pengajuan berdasarkan user
        $pengajuan = Pengajuan::whereHas('user', function($query) use ($userId) {
            $query->where('users.id', $userId);
        })->first();

        if (!$pengajuan) {
            return response()->json(['error' => 'Pengajuan tidak ditemukan untuk user dengan ID ' . $userId], 404);
        }

        // Siapkan data untuk diperbarui
        $dataToUpdate = ['status' => $request->status];

        // Cek status dan update tanggal yang relevan
        switch ($request->status) {
            case 'diajukan':
                $dataToUpdate['tanggal_diajukan'] = now(); // Atur tanggal diajukan
                break;

            case 'disetujui':
                $dataToUpdate['tanggal_disetujui'] = now(); // Atur tanggal disetujui
                break;

            case 'ditolak':
                $dataToUpdate['tanggal_ditolak'] = now(); // Atur tanggal ditolak
                break;
        }

        // Update status dan tanggal pada pivot table
        $pengajuan->user()->updateExistingPivot($userId, $dataToUpdate);

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
}


    public function storePesanPengajuanDosen(Request $request, $userId){
        try {
            $request->validate([
                'pesan' => 'nullable|string',
            ]);

            $pengajuan = Pengajuan::whereHas('user', function($query) use ($userId) {
                $query->where('users.id', $userId);
            })->first();

            if (!$pengajuan) {
                return response()->json(['error' => 'Pengajuan tidak ditemukan untuk user dengan ID ' . $userId], 404);
            }

            $pengajuan->user()->updateExistingPivot($userId, ['pesan' => $request->pesan]);

            return redirect()->back()->with('success', 'Pesan pengajuan berhasil diperbarui.');
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }



    public function indexPermohonan(){
        $permohonan = Permohonan::all();
        return view('home.verifikasi.permohonan_dosen', ['permohonan' => $permohonan]);
    }

    public function showPermohonan($id){
        $permohonan = Permohonan::with('user')->findOrFail($id);
        return view('home.verifikasi.permohonan_dosen_detail', ['permohonan' => $permohonan]);
    }

    // public function indexPermohonan(){
    //     $permohonan = Permohonan::all();
    //     return view('testing.verifikator.permohonan.index_permohonan', ['permohonan' => $permohonan]);
    // }

    // public function showPermohonan($id){
    //     $permohonan = Permohonan::with('user')->findOrFail($id);
    //     return view('testing.verifikator.permohonan.show_permohonan', ['permohonan' => $permohonan]);
    // }

    public function statusPermohonan($id){
        $permohonan = Permohonan::with('user')->findOrFail($id);

        if ($permohonan->status == false) {
            $permohonan->status = true;
        } else {
            $permohonan->status = false;
        }

        $permohonan->save();
        
        return redirect()->back();
    }

}
