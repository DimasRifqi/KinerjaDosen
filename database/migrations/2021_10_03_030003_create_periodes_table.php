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
        Schema::create('periode', function (Blueprint $table) {
            $table->id('id_periode');
            $table->string('nama_periode');
            $table->boolean('tipe_periode');
            $table->date('masa_periode_awal');
            $table->date('masa_periode_berakhir');
            $table->boolean('status')->default(true);
            $table->foreignId('id_child')->nullable()->constrained('periode', 'id_periode')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode');
    }
};
