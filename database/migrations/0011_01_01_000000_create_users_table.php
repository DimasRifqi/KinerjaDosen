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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_role')->nullable()->constrained('role', 'id_role')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_jabatan_fungsional')->nullable()->constrained('jabatan_fungsional', 'id_jabatan_fungsional')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_universitas')->nullable()->constrained('universitas', 'id_universitas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_pangkat_dosen')->nullable()->constrained('pangkat_dosen', 'id_pangkat_dosen')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_gelar_depan')->nullable()->constrained('gelar_depan', 'id_gelar_depan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_gelar_belakang')->nullable()->constrained('gelar_belakang', 'id_gelar_belakang')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('no_rek')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nidn')->nullable();
            $table->string('file_serdos')->nullable();
            $table->string('tanggal_lahir')->nullable()->date();
            $table->string('tempat_lahir')->nullable();
            $table->enum('status', ['aktif', 'non-aktif', 'pensiun', 'belajar'])->nullable()->default('aktif');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
