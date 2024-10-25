<?php

namespace App\Http\Controllers;

use App\Models\Span;
use App\Models\Span_Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpanController extends Controller
{
    public function updateSpanDosen()
{
    // Mulai transaksi database untuk memastikan integritas data
    DB::beginTransaction();

    try {
        // Ambil semua data span yang memiliki npwp atau no_rekening
        $spans = Span::whereNotNull('npwp')->orWhereNotNull('no_rekening')->get();

        foreach ($spans as $span) {
            // Cari user dengan npwp atau no_rek yang sama di tabel users
            $user = User::where('npwp', $span->npwp)
                        ->orWhere('no_rek', $span->no_rekening)
                        ->first();

            if ($user) {
                // Buat entri baru di span_dosen setiap kali ada kecocokan
                Span_Dosen::create([
                    'id' => $user->id,
                    'no_rekening' => $span->no_rekening,
                    'nama_penerima' => $span->nama_penerima,
                    'npwp' => $span->npwp,
                    'nama_pemilik_rekening' => $span->nama_pemilik_rekening,
                    'status' => true, // Set status ke true jika diperlukan
                ]);
            }
        }

        // Commit transaksi jika semua berhasil
        DB::commit();
        return response()->json(['success' => 'Data pada span_dosen berhasil diperbarui.']);
    } catch (\Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        DB::rollBack();
        return response()->json(['error' => 'Gagal memperbarui data: ' . $e->getMessage()]);
    }
}



}
