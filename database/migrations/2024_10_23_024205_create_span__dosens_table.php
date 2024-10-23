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
        Schema::create('span_dosen', function (Blueprint $table) {
           $table->id('id_span_dosen');
            $table->foreignId('id_user')->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('no_rekening_dosen')->nullable();
            $table->string('nama_penerima_dosen')->nullable();
            $table->string('npwp_dosen')->nullable();
            $table->string('nama_pemilik_rekening_dosen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('span__dosens');
    }
};
