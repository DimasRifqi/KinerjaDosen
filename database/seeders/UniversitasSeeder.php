<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('universitas')->insert([
            ["id_kota" => '1',
            'nama_universitas' => 'Universitas 17 Agustus 1945 Banyuwangi'],
            ["id_kota" => '2',
                'nama_universitas' =>  'Universitas 17 Agustus 1945 Surabaya'],
            ["id_kota" => '2',
                'nama_universitas' =>  'Universitas 45 Surabaya'],
            ["id_kota" => '3',
                'nama_universitas' =>  'Universitas Abdurachman Saleh'],
            ["id_kota" => '4',
                'nama_universitas' =>  'Universitas Bahaudin Mudhary Madura'],
        ]);
    }
}
