<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::insert([
            [
                'pertanyaan' => 'Bagaimana cara mengganti kata sandi?',
                'jawaban' => 'Masuk ke menu pengaturan akun, kemudian pilih "Ganti Kata Sandi" dan ikuti instruksi yang ada.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara melihat riwayat absensi?',
                'jawaban' => 'Klik pada menu "Absensi" di dashboard, kemudian pilih "Riwayat" untuk melihat absensi Anda.',
            ],
            [
                'pertanyaan' => 'Apa yang harus dilakukan jika lupa kata sandi?',
                'jawaban' => 'Klik "Lupa Kata Sandi" di halaman login, masukkan email yang terdaftar, dan ikuti petunjuk untuk mengatur ulang kata sandi.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara mengajukan cuti?',
                'jawaban' => 'Masuk ke menu "Cuti", pilih tanggal cuti yang diinginkan, dan klik "Ajukan Cuti".',
            ],
            [
                'pertanyaan' => 'Bagaimana cara melihat pengumuman terbaru?',
                'jawaban' => 'Klik pada menu "Pengumuman" di dashboard, dan Anda akan melihat daftar pengumuman terbaru.',
            ],
        ]);

    }
}