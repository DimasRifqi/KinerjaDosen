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
            [
                'pertanyaan' => 'Bagaimana cara mengubah foto profil?',
                'jawaban' => 'Masuk ke pengaturan akun, pilih "Ubah Foto Profil", lalu unggah foto baru dari perangkat Anda.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara memperbarui informasi kontak?',
                'jawaban' => 'Masuk ke menu pengaturan akun, kemudian pilih "Informasi Kontak" dan perbarui detail yang diperlukan.',
            ],
            [
                'pertanyaan' => 'Apa yang harus dilakukan jika tidak bisa login?',
                'jawaban' => 'Pastikan email dan kata sandi yang Anda masukkan benar, atau klik "Lupa Kata Sandi" untuk mengatur ulang.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara menambahkan anggota tim?',
                'jawaban' => 'Klik pada menu "Tim" di dashboard, pilih "Tambah Anggota", lalu masukkan detail anggota baru.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara melihat jadwal kerja?',
                'jawaban' => 'Buka menu "Jadwal" di dashboard, dan jadwal kerja Anda akan ditampilkan di sana.',
            ],
            [
                'pertanyaan' => 'Apa yang harus dilakukan jika mengalami masalah teknis?',
                'jawaban' => 'Hubungi tim dukungan teknis melalui menu "Bantuan" atau kirim email ke support@example.com.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara memperbarui aplikasi?',
                'jawaban' => 'Buka Google Play atau App Store, cari aplikasi kami, lalu klik "Perbarui" jika tersedia pembaruan.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara menonaktifkan notifikasi?',
                'jawaban' => 'Pergi ke pengaturan akun, pilih "Notifikasi", dan sesuaikan preferensi notifikasi Anda.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara mengunduh laporan absensi?',
                'jawaban' => 'Klik pada menu "Absensi", pilih "Riwayat", kemudian klik "Unduh Laporan" untuk mendownload dalam format PDF atau Excel.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara mereset pengaturan aplikasi?',
                'jawaban' => 'Masuk ke pengaturan akun, pilih "Reset Pengaturan", dan konfirmasi untuk mengembalikan pengaturan aplikasi ke kondisi default.',
            ],
        ]);

    }
}