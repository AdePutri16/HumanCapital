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
    Schema::create('preferences', function (Blueprint $table) {
        $table->id();
        $table->time('start_time')->nullable(); // Waktu masuk kerja
        $table->time('end_time')->nullable(); // Waktu pulang kerja
        $table->integer('annual_leave')->default(12); // Jumlah cuti tahunan default
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('preferences');
}

};
