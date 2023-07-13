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
        Schema::create('orangtua', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('alamat_ayah');
            $table->string('alamat_ibu');
            $table->foreignId('id_pekerjaan_ayah')->references('id')->on('pekerjaan');
            $table->foreignId('id_pekerjaan_ibu')->references('id')->on('pekerjaan');
            $table->string('nik_ayah', 16)->unique();
            $table->string('nik_ibu', 16)->unique();
            $table->string('photo_ayah')->nullable();
            $table->string('photo_ibu')->nullable();
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
        Schema::dropIfExists('pekerjaan');
    }
};
