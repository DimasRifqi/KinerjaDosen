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
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id('id_permohonan');
            $table->foreignId('id')->nullable()->constrained('users', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('permohonan');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

     public function down(): void
     {
         Schema::dropIfExists('permohonan');
     }



    /**
     * Reverse the migrations.
     */

};
