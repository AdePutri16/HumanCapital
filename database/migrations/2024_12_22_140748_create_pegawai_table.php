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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id(); // Primary key BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('user_id')->nullable(); // User_id sebagai unsigned BIGINT
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key ke tabel users
            $table->string('image_path')->nullable(); 
            $table->string('nama', 100)->nullable(); 
            $table->string('nip', 100)->nullable(); 
            $table->string('tmpt_lahir', 100)->nullable(); 
            $table->date('tgl_lahir')->nullable(); 
            $table->date('tmt')->nullable(); 
            $table->string('pendidikan', 100)->nullable(); 
            $table->year('tahun')->nullable(); 
            $table->string('jenis_kelamin', 10)->nullable(); // Mengubah dari enum ke string
            $table->string('nik', 16)->nullable(); 
            $table->string('jabatan', 100); // Tidak nullable jika diperlukan
            $table->string('status_kawin', 20)->nullable(); // Mengubah dari enum ke string
            $table->string('no_tlp', 15)->nullable(); 
            $table->string('email', 100)->nullable(); 
            $table->enum('role', ['admin', 'operator'])->nullable(); // Menggunakan enum tanpa default
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
