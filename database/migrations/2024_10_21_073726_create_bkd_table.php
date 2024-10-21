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
            $table->foreignId('id')->nullable()->constrained('users', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('nidn');
            $table->enum('kesimpulan_bkd', ['M', 'TM'])->nullable();
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
