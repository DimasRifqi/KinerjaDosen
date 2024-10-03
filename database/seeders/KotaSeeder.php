<?php

namespace Database\Seeders;

use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kota::insert([
            ['nama_kota' => 'Surabaya', 'id_provinsi' => 1],
            ['nama_kota' => 'Malang', 'id_provinsi' => 1],
            ['nama_kota' => 'Kediri', 'id_provinsi' => 1],
            ['nama_kota' => 'Madiun', 'id_provinsi' => 1],
            ['nama_kota' => 'Blitar', 'id_provinsi' => 1],
            ['nama_kota' => 'Probolinggo', 'id_provinsi' => 1],
            ['nama_kota' => 'Pasuruan', 'id_provinsi' => 1],
            ['nama_kota' => 'Banyuwangi', 'id_provinsi' => 1],
            ['nama_kota' => 'Jember', 'id_provinsi' => 1],
            ['nama_kota' => 'Mojokerto', 'id_provinsi' => 1],
            ['nama_kota' => 'Tulungagung', 'id_provinsi' => 1],
            ['nama_kota' => 'Lamongan', 'id_provinsi' => 1],
            ['nama_kota' => 'Tuban', 'id_provinsi' => 1],
            ['nama_kota' => 'Gresik', 'id_provinsi' => 1],
            ['nama_kota' => 'Sidoarjo', 'id_provinsi' => 1],
            ['nama_kota' => 'Ngawi', 'id_provinsi' => 1],
            ['nama_kota' => 'Pacitan', 'id_provinsi' => 1],
            ['nama_kota' => 'Situbondo', 'id_provinsi' => 1],
            ['nama_kota' => 'Bondowoso', 'id_provinsi' => 1],
            ['nama_kota' => 'Bojonegoro', 'id_provinsi' => 1],
        ]);
    }
}
