<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodi')->insert([
            [
            'nama_prodi' => 'S1 Antropologi'],
            [
            'nama_prodi' =>  'S1 Ekonomi'],
            [
                'nama_prodi' =>  'D4 Teknik Informatika'],
            [
                'nama_prodi' =>  'S1 Sejarah'],
            [
                'nama_prodi' =>  'S1 Sastra Jepang'],
        ]);
    }
}
