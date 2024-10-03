<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanFungsionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan_fungsional')->insert([
            ['nama_jabatan' => 'Asisten Ahli'],       // Jabatan fungsional Asisten Ahli
            ['nama_jabatan' => 'Lektor'],             // Jabatan fungsional Lektor
            ['nama_jabatan' => 'Lektor Kepala'],      // Jabatan fungsional Lektor Kepala
            ['nama_jabatan' => 'Guru Besar'],         // Jabatan fungsional Guru Besar (Profesor)
            ['nama_jabatan' => 'Peneliti Muda'],      // Jabatan peneliti fungsional muda
            ['nama_jabatan' => 'Peneliti Madya'],     // Jabatan peneliti fungsional madya
            ['nama_jabatan' => 'Peneliti Utama'],     // Jabatan peneliti fungsional utama
            ['nama_jabatan' => 'Tenaga Pengajar'],    // Jabatan fungsional sebagai tenaga pengajar
            ['nama_jabatan' => 'Dekan'],              // Jabatan struktural sebagai Dekan
            ['nama_jabatan' => 'Wakil Dekan'],        // Jabatan struktural sebagai Wakil Dekan
            ['nama_jabatan' => 'Rektor'],             // Jabatan struktural sebagai Rektor
            ['nama_jabatan' => 'Wakil Rektor'],       // Jabatan struktural sebagai Wakil Rektor
            ['nama_jabatan' => 'Kepala Laboratorium'], // Kepala Laboratorium
            ['nama_jabatan' => 'Kepala Program Studi'], // Kepala Program Studi (Kaprodi)
        ]);
    }
}
