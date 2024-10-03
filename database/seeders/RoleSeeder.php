<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            ['nama_role' => 'SuperAdmin'],
            ['nama_role' => 'Verifikator'],
            ['nama_role' => 'Perencanaan'],
            ['nama_role' => 'Keuangan'],
            ['nama_role' => 'Dosen'],
            ['nama_role' => 'Auditor'],
            ['nama_role' => 'OperatorPT'],


        ]);
    }
}
