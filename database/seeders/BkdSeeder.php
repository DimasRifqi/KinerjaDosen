<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BkdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bkd')->insert([
            'id_user' => 6, // Random user ID
                'id_periode' => 2, // Random periode ID
                'nidn' => null,
                'nama_dosen' => 'Jane Smith',
                'no_serdos' => '61845131',
                'pt' => 'UNTAG BANYUWANGI',
                'prodi' => 'S1 Ekonomi',
                'status' => null,
                'AB' => null,
                'C' => null,
                'D' => null,
                'E' => null,
                'jumlah' => null,
                'kesimpulan_bkd' => 'M',
                'kewajiban_khusus' => null,
                'kesimpulan' => 'Memenuhi',
        ]);
    }
}
