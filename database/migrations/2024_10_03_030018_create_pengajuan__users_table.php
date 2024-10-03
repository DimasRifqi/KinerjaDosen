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
        Schema::create('pengajuan_user', function (Blueprint $table) {
            $table->id('id_pengajuan_user');
            $table->foreignId('id_pengajuan')->nullable()->constrained('pengajuan', 'id_pengajuan')->cascadeOnDelete()->cascadeOnUpdate(); // Foreign key to pengajuan table
            $table->foreignId('id_user')->constrained('users'); // Foreign key to users table
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak']); // Enum for status
            $table->timestamps(); // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_user');
    }
};
