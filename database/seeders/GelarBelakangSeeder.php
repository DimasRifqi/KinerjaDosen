<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GelarBelakangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gelar_belakang')->insert([
            ['nama_gelar_belakang' => 'S.T.'],  // Sarjana Teknik
            ['nama_gelar_belakang' => 'S.Kom.'], // Sarjana Komputer
            ['nama_gelar_belakang' => 'S.E.'],  // Sarjana Ekonomi
            ['nama_gelar_belakang' => 'S.Pd.'], // Sarjana Pendidikan
            ['nama_gelar_belakang' => 'S.H.'],  // Sarjana Hukum
            ['nama_gelar_belakang' => 'S.Si.'], // Sarjana Sains
            ['nama_gelar_belakang' => 'S.Kes.'], // Sarjana Kesehatan
            ['nama_gelar_belakang' => 'S.Sos.'], // Sarjana Sosial
            ['nama_gelar_belakang' => 'M.T.'],  // Magister Teknik
            ['nama_gelar_belakang' => 'M.Kom.'], // Magister Komputer
            ['nama_gelar_belakang' => 'M.E.'],  // Magister Ekonomi
            ['nama_gelar_belakang' => 'M.Si.'], // Magister Sains
            ['nama_gelar_belakang' => 'M.Pd.'], // Magister Pendidikan
            ['nama_gelar_belakang' => 'M.Kes.'], // Magister Kesehatan
            ['nama_gelar_belakang' => 'M.H.'],  // Magister Hukum
            ['nama_gelar_belakang' => 'M.Sos.'], // Magister Sosial
            ['nama_gelar_belakang' => 'Ph.D.'], // Doktor Filsafat
            ['nama_gelar_belakang' => 'Dr.'],   // Doktor (Umum)
            ['nama_gelar_belakang' => 'Drg.'],  // Dokter Gigi
            ['nama_gelar_belakang' => 'Sp.THT.'], // Spesialis THT
            ['nama_gelar_belakang' => 'Sp.PD.'], // Spesialis Penyakit Dalam
            ['nama_gelar_belakang' => 'Sp.OG.'], // Spesialis Kebidanan
            ['nama_gelar_belakang' => 'Sp.KK.'], // Spesialis Kulit dan Kelamin
            ['nama_gelar_belakang' => 'Sp.A.'],  // Spesialis Anak
        ]);
    }
}
