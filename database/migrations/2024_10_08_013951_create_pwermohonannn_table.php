<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     public function up(): void
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id('id_permohonan');
            $table->foreignId('id')->nullable()->constrained('users', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_role_baru')->nullable()->constrained('role', 'id_role')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_jabatan_fungsional_baru')->nullable()->constrained('jabatan_fungsional', 'id_jabatan_fungsional')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_universitas_baru')->nullable()->constrained('universitas', 'id_universitas')->cascadeOnDelete()->cascadeOnUpdate();           
            $table->foreignId('id_pangkat_dosen_baru')->nullable()->constrained('pangkat_dosen', 'id_pangkat_dosen')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('gelar_depan_baru')->nullable();
            $table->string('gelar_belakang_baru')->nullable();
            $table->foreignId('id_bank_baru')->nullable()->constrained('bank', 'id_bank')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name_baru')->nullable();
            $table->date('masa_kerja_baru')->nullable();
            $table->string('nama_rekening_baru')->nullable();
            $table->string('no_rek_baru')->nullable();
            $table->string('npwp_baru')->nullable();
            $table->string('nidn_baru')->nullable();
            $table->string('file_serdos_baru')->nullable();
            $table->string('tanggal_lahir_baru')->nullable()->date();
            $table->string('tempat_lahir_baru')->nullable();
            $table->string('image_baru')->nullable();
            $table->string('email_baru')->unique()->nullable();
            $table->string('password_baru')->nullable();
            $table->enum('status_baru', ['aktif', 'non-aktif', 'pensiun', 'belajar'])->nullable()->default('aktif');
            $table->text('permohonan')->nullable();
            $table->enum('status_permohonan', ['proses', 'ditolak', 'disetujui'])->nullable()->default('proses');
            $table->text('pesan_admin')->nullable();
            $table->string('lampiran_permohonan')->nullable();
            $table->timestamps();
        });
    }

     public function down(): void
     {
         Schema::dropIfExists('permohonan');
     }



    /**
     * Reverse the migrations.
     */

};
