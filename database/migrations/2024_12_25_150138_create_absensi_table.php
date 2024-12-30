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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');  // Kolom untuk ID Pegawai
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->string('lokasi_masuk')->nullable();
            $table->string('lokasi_keluar')->nullable();
            $table->string('foto_masuk')->nullable();
            $table->string('foto_keluar')->nullable();
            $table->timestamps();
            
            // Menambahkan foreign key
            $table->foreign('id_pegawai')
                  ->references('id')
                  ->on('pegawai')  // Nama tabel yang menjadi referensi
                  ->onDelete('cascade');  // Mengatur aksi saat data dihapus
        });
    }

    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
