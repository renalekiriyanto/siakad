<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jadwalmapel')->references('id')->on('jadwal_mapel');
            $table->foreignId('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreignId('id_kehadiran')->references('id')->on('kehadiran');
            $table->timestamp('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi_siswa');
    }
};
