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
            $table->string('no_rekening');
            $table->string('nama_penerima');
            $table->string('npwp');
            $table->string('nama_pemilik_rekening');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spans');
    }
};
