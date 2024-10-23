<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank')->insert([
            ['nama_bank' => 'BRI'],
            ['nama_bank' => 'BCA'],
            ['nama_bank' => 'Mandiri'],
            ['nama_bank' => 'BNI'],
            ['nama_bank' => 'BTN'],
            ['nama_bank' => 'CIMB Niaga'],
            ['nama_bank' => 'Permata Bank'],
            ['nama_bank' => 'Panin Bank'],
            ['nama_bank' => 'Bank Danamon'],
            ['nama_bank' => 'Bank Mega'],
        ]);
    }
}
