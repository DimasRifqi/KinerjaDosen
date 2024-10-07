<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengajuan_user', function (Blueprint $table) {
            $table->id('id_pengajuan_user');
            $table->foreignId('id_pengajuan')->nullable()->constrained('pengajuan', 'id_pengajuan')->cascadeOnDelete()->cascadeOnUpdate(); // Foreign key to pengajuan table
            $table->foreignId('id')->constrained('users', 'id');
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak'])->default('diajukan');
            $table->text('pesan')->nullable();
            $table->date('tanggal_diajukan')->nullable();
            $table->date('tanggal_disetujui')->nullable();
            $table->date('tanggal_ditolak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_user');
    }
};
