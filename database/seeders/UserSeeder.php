<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id_role' => 1, // Sesuaikan dengan ID role yang ada
                'id_jabatan_fungsional' => 2, // Sesuaikan dengan ID jabatan fungsional yang ada
                'id_universitas' => null, // Sesuaikan dengan ID universitas yang ada
                'id_pangkat_dosen' => 3, // Sesuaikan dengan ID pangkat dosen yang ada
                'id_gelar_depan' => 1, // Sesuaikan dengan ID gelar depan yang ada
                'id_gelar_belakang' => 2, // Sesuaikan dengan ID gelar belakang yang ada
                'name' => 'Dr. Bambang S.T., M.T.',
                'no_rek' => '1234567890',
                'npwp' => '0987654321',
                'nidn' => '123456789',
                'file_serdos' => 'sertifikat_serdos.pdf',
                'tanggal_lahir' => '1980-01-01',
                'tempat_lahir' => 'Jakarta',
                'status' => 'aktif',
                'image' => 'bambang.jpg',
                'email' => 'bambang@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Jangan lupa hash password
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_role' => 2, // Sesuaikan dengan ID role yang ada
                'id_jabatan_fungsional' => 1, // Sesuaikan dengan ID jabatan fungsional yang ada
                'id_universitas' => null, // Sesuaikan dengan ID universitas yang ada
                'id_pangkat_dosen' => 4, // Sesuaikan dengan ID pangkat dosen yang ada
                'id_gelar_depan' => 2, // Sesuaikan dengan ID gelar depan yang ada
                'id_gelar_belakang' => 3, // Sesuaikan dengan ID gelar belakang yang ada
                'name' => 'Prof. Dr. Siti, S.H., M.H.',
                'no_rek' => '0987654321',
                'npwp' => '1234567890',
                'nidn' => '987654321',
                'file_serdos' => 'sertifikat_serdos_siti.pdf',
                'tanggal_lahir' => '1975-05-10',
                'tempat_lahir' => 'Surabaya',
                'status' => 'aktif',
                'image' => 'siti.jpg',
                'email' => 'siti@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Jangan lupa hash password
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
