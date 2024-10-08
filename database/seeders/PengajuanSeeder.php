<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengajuan::insert([
            [
                'id_periode' => 1,
                'draft' => 1,
            ],
            [
                'id_periode' => 2,
                'draft' => 1,
            ],
            [
                'id_periode' => 1,
                'draft' => 0,
            ],
        ]);
    }
}
