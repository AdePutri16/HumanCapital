<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanCutiTable extends Migration
{
    public function up()
    {
        Schema::create('pengajuan_cuti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id')->nullable(false)->change();
            $table->string('nama_lengkap');
            $table->string('jabatan');
            $table->string('nip');
            $table->enum('jenis_cuti', [
                'tahunan', 
                'besar', 
                'melahirkan', 
                'alasan-penting', 
                'luar-tanggungan-negara'
            ]);
            $table->date('mulai_cuti');
            $table->date('selesai_cuti');
            $table->text('alamat');
            $table->timestamps();
            $table->enum('status', ['Menunggu Validasi', 'Ditolak', 'Diterima', 'pending'])->default('pending');
            // Foreign key constraint
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajuan_cuti');
    }
}
