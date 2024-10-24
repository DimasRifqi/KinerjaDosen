<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_periode' => 'November 2024',
                'tipe_periode' => true, // Contoh tipe periode (true/false)
                'masa_periode_awal' => Carbon::createFromFormat('Y-m-d', '2024-01-01'),
                'masa_periode_berakhir' => Carbon::createFromFormat('Y-m-d', '2024-06-30'),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_periode' => 'Oktober 2024',
                'tipe_periode' => false,
                'masa_periode_awal' => Carbon::createFromFormat('Y-m-d', '2024-07-01'),
                'masa_periode_berakhir' => Carbon::createFromFormat('Y-m-d', '2024-12-31'),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data periode lainnya sesuai kebutuhan
        ];

        // Insert data ke tabel periode
        DB::table('periode')->insert($data);
    }
}
