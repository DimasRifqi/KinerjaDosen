<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodi')->insert([
            ['nama_prodi' => 'S1 Antropologi'],
            ['nama_prodi' =>  'S1 Ekonomi'],
            ['nama_prodi' =>  'D4 Teknik Informatika'],
            ['nama_prodi' =>  'S1 Sejarah'],
            ['nama_prodi' =>  'S1 Sastra Jepang'],
            ['nama_prodi' => 'S1 Ekonomi'],
            ['nama_prodi' => 'S1 Manajemen'],
            ['nama_prodi' => 'S1 Akuntansi'],
            ['nama_prodi' => 'S1 Hukum'],
            ['nama_prodi' => 'S1 Teknik Sipil'],
            ['nama_prodi' => 'S1 Teknik Elektro'],
            ['nama_prodi' => 'S1 Teknik Mesin'],
            ['nama_prodi' => 'S1 Teknik Informatika'],
            ['nama_prodi' => 'S1 Sistem Informasi'],
            ['nama_prodi' => 'S1 Pendidikan Bahasa Inggris'],
            ['nama_prodi' => 'S1 Pendidikan Matematika'],
            ['nama_prodi' => 'S1 Pendidikan Biologi'],
            ['nama_prodi' => 'S1 Pendidikan Fisika'],
            ['nama_prodi' => 'S1 Ilmu Komunikasi'],
            ['nama_prodi' => 'S1 Psikologi'],
            ['nama_prodi' => 'S1 Farmasi'],
            ['nama_prodi' => 'S1 Kedokteran'],
            ['nama_prodi' => 'S1 Keperawatan'],
            ['nama_prodi' => 'S1 Agribisnis'],
            ['nama_prodi' => 'S1 Ilmu Politik'],
        ]);
    }
}
