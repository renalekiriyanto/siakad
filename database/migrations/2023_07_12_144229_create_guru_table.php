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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('nip', 18)->nullable()->unique();
            $table->string('nuptk', 16)->nullable()->unique();
            $table->string('nrg', 12)->nullable()->unique();
            $table->foreignId('id_pangkat')->references('id')->on('pangkat');
            $table->foreignId('id_golongan')->nullable()->references('id')->on('golongan');
            $table->foreignId('id_jabatan')->nullable()->references('id')->on('jabatan');
            $table->foreignId('id_pendidikan')->references('id')->on('pendidikan');
            $table->string('nik')->unique();
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
        Schema::dropIfExists('guru');
    }
};
