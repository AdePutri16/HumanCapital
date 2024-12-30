<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSisaCutiToPegawaiTable extends Migration
{
    public function up()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->integer('sisa_cuti')->default(12); // Jumlah cuti tahunan, misalnya 12 hari
        });
    }

    public function down()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropColumn('sisa_cuti');
        });
    }
}
