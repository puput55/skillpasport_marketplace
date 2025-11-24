<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('kontak', 13)->nullable();
            $table->string('username', 20)->unique();
            $table->string('password', 100);
            $table->enum('role', ['admin', 'member'])->default('member');

            // Tambah kolom status untuk approval member
            $table->enum('status', ['pending', 'active'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse migrasi
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
