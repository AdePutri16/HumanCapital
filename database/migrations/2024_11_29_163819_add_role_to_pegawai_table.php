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
        Schema::table('pegawai', function (Blueprint $table) {
            // Memeriksa apakah kolom 'role' sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('pegawai', 'role')) {
                $table->enum('role', ['admin', 'operator'])->default('operator');
            }
        });
        Schema::table('pegawai', function (Blueprint $table) {
            // Menambahkan kolom 'user_id' jika belum ada
            if (!Schema::hasColumn('pegawai', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            // Menghapus kolom 'role' jika ada
            $table->dropColumn('role');
        });
    }
};
