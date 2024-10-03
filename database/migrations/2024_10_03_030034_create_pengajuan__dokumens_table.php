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
        Schema::create('pengajuan_dokumen', function (Blueprint $table) {
            $table->id('id_pengajuan_dokumen');
            $table->foreignId('id_pengajuan')->nullable()->constrained('pengajuan', 'id_pengajuan')->cascadeOnDelete()->cascadeOnUpdate(); // Foreign key to pengajuan table
            $table->string('nama_dokumen');
            $table->string('file_dokumen');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_dokumen');
    }
};
