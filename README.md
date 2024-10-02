<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Kinerja Dosen
Kinerja Dosen adalah aplikasi berbasis Laravel 11 yang dirancang untuk mendukung proses administrasi dan pembayaran tunjangan dosen di seluruh perguruan tinggi di Jawa Timur, yang dikelola oleh LLDIKTI Wilayah 7. Aplikasi ini memungkinkan pengguna dari berbagai level untuk melakukan pendaftaran, pengelolaan data, serta pengajuan dan pemantauan tunjangan bulanan dosen.

## Role Pengguna
- SuperAdmin: Memiliki akses penuh untuk mengelola seluruh aplikasi.
- LLDIKTI - Keuangan: Bertanggung jawab atas administrasi pembayaran tunjangan.
- LLDIKTI - Verifikator: Memverifikasi pengajuan tunjangan yang diajukan oleh perguruan tinggi.
- LLDIKTI - Perencanaan: Mengatur perencanaan anggaran terkait tunjangan dosen.
- Operator Perguruan Tinggi (OPT): Mengelola pengajuan dan data dosen di perguruan tinggi masing-masing.
- Auditor: Melakukan audit terkait pengajuan dan pembayaran tunjangan.
- Dosen: Memiliki akses untuk mengedit data diri dan melihat pengajuan tunjangannya.

## Teknologi yang Digunakan
- Framework: Laravel 11
- Database: MySQL
- PHP 8.3

## Cara Memulai
1. Clone repositori ini.
2. Jalankan perintah composer install.
3. Setup file .env sesuai dengan konfigurasi database Anda.
4. Jalankan migrasi dan seed dengan perintah php artisan migrate --seed.
5. Jalankan aplikasi dengan perintah php artisan serve.

## Links
- Project Management [GSheets](https://docs.google.com/spreadsheets/d/16k5su4XtKeZNrBc8a_TaJlUv2Qr804rjCS-8WJymt-I/edit?usp=sharing).
- Desain Kasar Website [Figma](https://www.figma.com/design/4Mtp972XE8i9YPKyLKC4a1/Untitled?node-id=0-1&t=SgYU39gRTuntAhqc-1).
- Flowcharts [Figma Jamboard](https://www.figma.com/board/6o6JacUdpNeZrcZKgaKD5G/Flowchart-Kinerja-Dosen?node-id=0-1&t=EB9j7kWeaMCQxN2W-1).
- Desain Kasar Mobile [Figma](https://www.figma.com/design/HnGAjbI4r0ZTPHK9RvJqE7/SIKMA?node-id=1-2&t=IehMVsQUCgAhfifw-1).

## Kontribusi
Kontribusi dalam bentuk pull request dipersilakan. 
Pastikan untuk membuat branch baru untuk setiap kontributor, mengikuti standar coding yang ditetapkan, dan membuat Commit message yang **Sopan** dan **Deskriptif**.
