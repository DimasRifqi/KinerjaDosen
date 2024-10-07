<?php

namespace Database\Seeders;

use App\Models\User;
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
        {
            $users = [
                [
                
                    'id_role' => 5,
                    'id_jabatan_fungsional' => null,
                    'id_universitas' => 1,
                    'id_prodi' => null,
                    'id_pangkat_dosen' => null,
                    'id_gelar_depan' => null,
                    'id_gelar_belakang' => null,
                    'name' => 'John Doe',
                    'no_rek' => '1234567890',
                    'npwp' => '0987654321',
                    'nidn' => '0123456789',
                    'file_serdos' => null,
                    'tanggal_lahir' => '1985-01-01',
                    'tempat_lahir' => 'Jakarta',
                    'status' => 'aktif',
                    'image' => null,
                    'email' => 'john.doe@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id_role' => 5,
                    'id_jabatan_fungsional' => null,
                    'id_universitas' => 1,
                    'id_prodi' => null,
                    'id_pangkat_dosen' => null,
                    'id_gelar_depan' => null,
                    'id_gelar_belakang' => null,
                    'name' => 'Jane Smith',
                    'no_rek' => '9876543210',
                    'npwp' => '1234509876',
                    'nidn' => '0987612345',
                    'file_serdos' => null,
                    'tanggal_lahir' => '1990-02-02',
                    'tempat_lahir' => 'Bandung',
                    'status' => 'aktif',
                    'image' => null,
                    'email' => 'jane.smith@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id_role' => 5,
                    'id_jabatan_fungsional' => null,
                    'id_universitas' => 1,
                    'id_prodi' => null,
                    'id_pangkat_dosen' => null,
                    'id_gelar_depan' => null,
                    'id_gelar_belakang' => null,
                    'name' => 'Alice Johnson',
                    'no_rek' => '5432109876',
                    'npwp' => '8765432109',
                    'nidn' => '6543210987',
                    'file_serdos' => null,
                    'tanggal_lahir' => '1988-03-03',
                    'tempat_lahir' => 'Surabaya',
                    'status' => 'aktif',
                    'image' => null,
                    'email' => 'alice.johnson@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id_role' => 5,
                    'id_jabatan_fungsional' => null,
                    'id_universitas' => 1,
                    'id_prodi' => null,
                    'id_pangkat_dosen' => null,
                    'id_gelar_depan' => null,
                    'id_gelar_belakang' => null,
                    'name' => 'Michael Brown',
                    'no_rek' => '1122334455',
                    'npwp' => '3344556677',
                    'nidn' => '1122443355',
                    'file_serdos' => null,
                    'tanggal_lahir' => '1992-04-04',
                    'tempat_lahir' => 'Medan',
                    'status' => 'aktif',
                    'image' => null,
                    'email' => 'michael.brown@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => null,
                ],
                [
                    'id_role' => 5,
                    'id_jabatan_fungsional' => null,
                    'id_universitas' => 1,
                    'id_prodi' => null,
                    'id_pangkat_dosen' => null,
                    'id_gelar_depan' => null,
                    'id_gelar_belakang' => null,
                    'name' => 'David Williams',
                    'no_rek' => '6677889900',
                    'npwp' => '9988776655',
                    'nidn' => '3344556677',
                    'file_serdos' => null,
                    'tanggal_lahir' => '1987-05-05',
                    'tempat_lahir' => 'Yogyakarta',
                    'status' => 'aktif',
                    'image' => null,
                    'email' => 'david.williams@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => null,
                ],

                [
                    'id_role' => 7,
                    'id_jabatan_fungsional' => null,
                    'id_universitas' => 1,
                    'id_prodi' => null,
                    'id_pangkat_dosen' => null,
                    'id_gelar_depan' => null,
                    'id_gelar_belakang' => null,
                    'name' => 'OP PT 17 Banyuwangi',
                    'no_rek' => '6677889900',
                    'npwp' => '9988776655',
                    'nidn' => '3344556677',
                    'file_serdos' => null,
                    'tanggal_lahir' => '1987-05-05',
                    'tempat_lahir' => 'Yogyakarta',
                    'status' => 'aktif',
                    'image' => null,
                    'email' => 'oppt@gmail.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => null,
                ],
            ];

            foreach ($users as $user) {
                User::create($user);
            }
        }
    }
}
