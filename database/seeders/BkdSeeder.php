<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BkdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bkd')->insert([
            'nidn' => '12345678',
            'name' => 'John Doe',
            'kesimpulan_bkd' => 'M',
        ]);
    }
}
