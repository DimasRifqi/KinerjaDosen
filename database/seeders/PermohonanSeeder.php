<?php

namespace Database\Seeders;

use App\Models\Permohonan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permohonan::insert([
            [
                'id' => '7',
                'permohonan' => 'ganti nama gelar_depan',
                'status' => 1,
            ],
            [
                'id' => '8',
                'permohonan' => 'ganti no rekening',
                'status' => 1,
            ],
        ]);
    }
}