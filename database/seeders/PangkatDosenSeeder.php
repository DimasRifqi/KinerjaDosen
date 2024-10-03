<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PangkatDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pangkat_dosen')->insert([
            ['nama_pangkat' => 'Penata Muda'],            
            ['nama_pangkat' => 'Penata Muda Tingkat I'],
            ['nama_pangkat' => 'Penata'],
            ['nama_pangkat' => 'Penata Tingkat I'],
            ['nama_pangkat' => 'Pembina'],
            ['nama_pangkat' => 'Pembina Tingkat I'],
            ['nama_pangkat' => 'Pembina Utama Muda'],
            ['nama_pangkat' => 'Pembina Utama Madya'],
            ['nama_pangkat' => 'Pembina Utama'],
        ]);
    }
}
