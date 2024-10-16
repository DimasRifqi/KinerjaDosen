<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Informasi::insert([
            [
                'judul' => 'Ajukan Informasi',
                'deskripsi' => 'Pengajuan anda ditunda',
                'image_informasi' => null,
            ],
            [
                'judul' => 'Informasi Terkini',
                'deskripsi' => 'Pembaharuan informasi terbaru akan diumumkan minggu depan',
                'image_informasi' => null,
            ],
            [
                'judul' => 'Laporan Mingguan',
                'deskripsi' => 'Laporan mingguan telah diterbitkan',
                'image_informasi' => null,
            ],
            [
                'judul' => 'Pengingat Penting',
                'deskripsi' => 'Harap ingat untuk menyelesaikan tugas sebelum tenggat waktu',
                'image_informasi' => null,
            ],
            [
                'judul' => 'Acara Mendatang',
                'deskripsi' => 'Jangan lupa untuk menghadiri acara tahunan kami',
                'image_informasi' => null,
            ],
            [
                'judul' => 'Pembaharuan Sistem',
                'deskripsi' => 'Sistem akan menjalani pemeliharaan pada hari Sabtu',
                'image_informasi' => null,
            ],
        ]);

    }
}