<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GelarDepanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gelar_depan')->insert([
            ['nama_gelar_depan' => 'Prof.'], // Profesor
            ['nama_gelar_depan' => 'Dr.'],   // Doktor
            ['nama_gelar_depan' => 'Ir.'],   // Insinyur
            ['nama_gelar_depan' => 'Dr.Eng.'], // Doktor Teknik
            ['nama_gelar_depan' => 'Drs.'],   // Doktorandus
            ['nama_gelar_depan' => 'Drg.'],   // Dokter Gigi
        ]);
    }
}
