<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            User::create([
                'id_role' => 5, // Always set to 5 as per your requirement
                'id_jabatan_fungsional' => rand(1, 5),
                'id_universitas' => rand(1, 20),
                'id_prodi' => rand(1, 10),
                'id_pangkat_dosen' => rand(1, 5),
                'id_gelar_depan' => rand(1, 5),
                'id_gelar_belakang' => rand(1, 5),
                'id_bank' => 1,
                'name' => 'User ' . $i,
                'awal_kerja' => now()->subYears(rand(1, 20))->toDateString(),
                'nama_rekening' => 'User Rekening ' . $i,
                'no_rek' => '123456789' . $i,
                'npwp' => '987654321' . $i,
                'nidn' => '000' . $i . rand(100, 999),
                'file_serdos' => 'file_serdos_' . $i . '.pdf',
                'tanggal_lahir' => now()->subYears(rand(20, 50))->toDateString(),
                'tempat_lahir' => 'City ' . $i,
                'status' => 'aktif',
                'image' => 'image' . $i . '.jpg',
                'email' => 'user' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Default password
                'remember_token' => null,
            ]);
        }
    }
}
