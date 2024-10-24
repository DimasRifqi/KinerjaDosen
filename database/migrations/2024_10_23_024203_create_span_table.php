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
        Schema::create('span', function (Blueprint $table) {
            $table->id('id_span');
            $table->string('no_rekening')->nullable();
            $table->string('nama_penerima')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nama_pemilik_rekening')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('span');
    }
};