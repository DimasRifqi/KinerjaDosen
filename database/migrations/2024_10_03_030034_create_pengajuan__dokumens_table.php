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
            $table->foreignId('id_pengajuan')->nullable()->constrained('pengajuan', 'id_pengajuan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_user')->nullable()->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_dokumen')->nullable();
            $table->string('file_dokumen')->nullable();
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
