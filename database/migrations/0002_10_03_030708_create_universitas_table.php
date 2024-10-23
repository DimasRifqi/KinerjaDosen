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
        Schema::create('universitas', function (Blueprint $table) {
            $table->id('id_universitas');
            $table->string('kode_pt')->nullable();
            $table->foreignId('id_kota')->nullable()->constrained('kota', 'id_kota')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_universitas')->unique();
            $table->enum('tipe', ['pemerintahan', 'lldikti', 'universitas'])->default('universitas');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universitas');
    }
};
