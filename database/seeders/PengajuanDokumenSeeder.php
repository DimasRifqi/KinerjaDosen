<?php

namespace Database\Seeders;

use App\Models\Pengajuan_Dokumen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengajuan_Dokumen::insert([
            [
                'id_pengajuan' => '1',
                'id_user' => '5',
                'nama_dokumen' => 'pengajuan dosen',
                'file_dokumen' => null,
            ],
            [
                'id_pengajuan' => '2',
                'id_user' => '6',
                'nama_dokumen' => 'pengajuan dosen 2',
                'file_dokumen' => null,
            ],
        ]);
    }
}