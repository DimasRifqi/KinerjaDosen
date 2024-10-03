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
            ['id_universitas' => '1',
            'nama_prodi' => 'S1 Antropologi'],
            ['id_universitas' => '2',
            'nama_prodi' =>  'S1 Ekonomi'],
            ['id_universitas' => '2',
                'nama_prodi' =>  'D4 Teknik Informatika'],
            ['id_universitas' => '3',
                'nama_prodi' =>  'S1 Sejarah'],
            ['id_universitas' => '4',
                'nama_prodi' =>  'S1 Sastra Jepang'],
        ]);
    }
}
