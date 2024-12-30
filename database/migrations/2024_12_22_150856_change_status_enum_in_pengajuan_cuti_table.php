<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStatusEnumInPengajuanCutiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE pengajuan_cuti CHANGE COLUMN status status ENUM('Menunggu Validasi', 'Ditolak', 'Disetujui', 'pending') DEFAULT 'pending';");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE pengajuan_cuti CHANGE COLUMN status status ENUM('Menunggu Validasi', 'Ditolak', 'Diterima', 'pending') DEFAULT 'pending';");
    }
}
