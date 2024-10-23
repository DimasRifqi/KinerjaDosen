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
            ['nama_jabatan' => 'Asisten Ahli'],
            ['nama_jabatan' => 'Lektor'],
            ['nama_jabatan' => 'Lektor Kepala'],
            ['nama_jabatan' => 'Guru Besar'],
        ]);
    }
}
