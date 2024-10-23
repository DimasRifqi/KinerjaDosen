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
        Schema::create('bkd', function (Blueprint $table) {
            $table->id('id_bkd');
            $table->foreignId('id_user')->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_periode')->constrained('periode', 'id_periode')->cascadeOnDelete();
            $table->string('nidn')->nullable();
            $table->string('nama_dosen')->nullable();
            $table->string('no_serdos')->nullable();
            $table->string('pt')->nullable();
            $table->string('prodi')->nullable();
            $table->string('status')->nullable();
            $table->string('AB')->nullable();
            $table->string('C')->nullable();
            $table->string('D')->nullable();
            $table->string('E')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('kesimpulan_bkd')->nullable();
            $table->string('kewajiban_khusus')->nullable();
            $table->string('kesimpulan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bkd');
    }
};
