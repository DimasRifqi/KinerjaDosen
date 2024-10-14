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
            ['id_kota' => '1', 'nama_universitas' => 'Universitas 17 Agustus 1945 Banyuwangi'],
            ['id_kota' => '2', 'nama_universitas' => 'Universitas Muhammadiyah Malang'],
            ['id_kota' => '3', 'nama_universitas' => 'Universitas Airlangga'],
            ['id_kota' => '4', 'nama_universitas' => 'Institut Teknologi Sepuluh Nopember'],
            ['id_kota' => '5', 'nama_universitas' => 'Universitas Islam Negeri Sunan Ampel Surabaya'],
            ['id_kota' => '6', 'nama_universitas' => 'Universitas Surabaya'],
            ['id_kota' => '7', 'nama_universitas' => 'Universitas Jember'],
            ['id_kota' => '8', 'nama_universitas' => 'Universitas Trunojoyo Madura'],
            ['id_kota' => '9', 'nama_universitas' => 'Universitas Negeri Malang'],
            ['id_kota' => '10', 'nama_universitas' => 'Universitas Muhammadiyah Surabaya'],
            ['id_kota' => '11', 'nama_universitas' => 'Universitas Katolik Widya Mandala Surabaya'],
            ['id_kota' => '12', 'nama_universitas' => 'Universitas Islam Malang'],
            ['id_kota' => '13', 'nama_universitas' => 'Institut Teknologi Adhi Tama Surabaya'],
            ['id_kota' => '14', 'nama_universitas' => 'Universitas Narotama Surabaya'],
            ['id_kota' => '15', 'nama_universitas' => 'Universitas PGRI Adi Buana Surabaya'],
            ['id_kota' => '16', 'nama_universitas' => 'Universitas Dr. Soetomo'],
            ['id_kota' => '17', 'nama_universitas' => 'Universitas 17 Agustus 1945 Surabaya'],
            ['id_kota' => '18', 'nama_universitas' => 'Universitas Merdeka Malang'],
            ['id_kota' => '19', 'nama_universitas' => 'Universitas Kanjuruhan Malang'],
            ['id_kota' => '20', 'nama_universitas' => 'Universitas Pembangunan Nasional Veteran Jawa Timur'],
        ]);
    }
}
