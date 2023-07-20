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
        Schema::create('jadwal_mapel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mapel')->references('id')->on('mapel')->onDelete('cascade');
            $table->foreignId('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->string('hari');
            $table->string('jam_mulai');
            $table->string('jam_berakhir');
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
        Schema::dropIfExists('jadwal_mapel');
    }
};
