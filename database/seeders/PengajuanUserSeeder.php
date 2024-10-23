<?php

namespace Database\Seeders;

use App\Models\Pengajuan_User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengajuan_User::insert([
            [
                'id_pengajuan' => '1',
                'id' => '5',
                'status' => 'diajukan',
                'pesan' => null,
                'tanggal_diajukan' => '2024-10-15',
                'tanggal_disetujui' => null,
                'tanggal_ditolak' => null,
            ],
            [
                'id_pengajuan' => '2',
                'id' => '6',
                'status' => 'disetujui',
                'pesan' => null,
                'tanggal_diajukan' => '2024-10-10',
                'tanggal_disetujui' => '2024-10-12',
                'tanggal_ditolak' => null,
            ],
            [
                'id_pengajuan' => '1',
                'id' => '6',
                'status' => 'ditolak',
                'pesan' => 'Dokumen tidak lengkap',
                'tanggal_diajukan' => '2024-09-30',
                'tanggal_disetujui' => null,
                'tanggal_ditolak' => '2024-10-02',
            ],
            [
                'id_pengajuan' => '2',
                'id' => '5',
                'status' => 'diajukan',
                'pesan' => null,
                'tanggal_diajukan' => '2024-10-05',
                'tanggal_disetujui' => null,
                'tanggal_ditolak' => null,
            ],
            [
                'id_pengajuan' => '2',
                'id' => '6',
                'status' => 'ditolak',
                'pesan' => 'Tidak memenuhi syarat',
                'tanggal_diajukan' => '2024-10-07',
                'tanggal_disetujui' => null,
                'tanggal_ditolak' => '2024-10-08',
            ],
        ]);


    }
}