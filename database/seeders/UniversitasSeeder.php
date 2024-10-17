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
            ["id_kota" => '1', 'nama_universitas' => 'Universitas 17 Agustus 1945 Banyuwangi', 'tipe' => 'universitas', 'status' => 1],
            ["id_kota" => '2', 'nama_universitas' => 'Universitas 45 Surabaya', 'tipe' => 'universitas', 'status' => 1],
            ["id_kota" => '3', 'nama_universitas' => 'Universitas Abdurachman Saleh', 'tipe' => 'universitas', 'status' => 1],
            ["id_kota" => '4', 'nama_universitas' => 'Universitas Bahaudin Mudhary Madura', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '1', 'nama_universitas' => 'Universitas 17 Agustus 1945 Surabaya', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '2', 'nama_universitas' => 'Universitas Muhammadiyah Malang', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '3', 'nama_universitas' => 'Universitas Airlangga', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '4', 'nama_universitas' => 'Institut Teknologi Sepuluh Nopember', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '5', 'nama_universitas' => 'Universitas Islam Negeri Sunan Ampel Surabaya', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '6', 'nama_universitas' => 'Universitas Surabaya', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '7', 'nama_universitas' => 'Universitas Jember', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '8', 'nama_universitas' => 'Universitas Trunojoyo Madura', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '9', 'nama_universitas' => 'Universitas Negeri Malang', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '10', 'nama_universitas' => 'Universitas Muhammadiyah Surabaya', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '11', 'nama_universitas' => 'Universitas Katolik Widya Mandala Surabaya', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '12', 'nama_universitas' => 'Universitas Islam Malang', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '13', 'nama_universitas' => 'Institut Teknologi Adhi Tama Surabaya', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '14', 'nama_universitas' => 'Universitas Narotama Surabaya', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '15', 'nama_universitas' => 'Universitas PGRI Adi Buana Surabaya', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '16', 'nama_universitas' => 'Universitas Dr. Soetomo', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '17', 'nama_universitas' => 'Universitas 17 Agustus 1945 Jakarta', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '18', 'nama_universitas' => 'Universitas Merdeka Malang', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '19', 'nama_universitas' => 'Universitas Kanjuruhan Malang', 'tipe' => 'universitas', 'status' => 1],
            ['id_kota' => '20', 'nama_universitas' => 'Universitas Pembangunan Nasional Veteran Jawa Timur', 'tipe' => 'universitas', 'status' => 1],
        ]);


    }
}
