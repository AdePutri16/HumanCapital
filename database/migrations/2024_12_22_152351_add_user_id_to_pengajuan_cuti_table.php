<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPengajuanCutiTable extends Migration
{
    public function up()
    {
        Schema::table('pengajuan_cuti', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Tambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key untuk tabel users
        });
    }

    public function down()
    {
        Schema::table('pengajuan_cuti', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Hapus foreign key
            $table->dropColumn('user_id'); // Hapus kolom user_id
        });
    }
}
