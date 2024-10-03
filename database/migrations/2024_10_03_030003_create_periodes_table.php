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
            $table->boolean('tipe_periode'); // true or false to indicate the type
            $table->date('masa_periode_awal');
            $table->date('masa_periode_berakhir');
            $table->boolean('status'); // active or inactive status
            $table->timestamps(); // created_at and updated_at fields
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
