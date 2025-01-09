<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->char('nisn', 10)->primary();
            $table->char('nis', 8)->unique();
            $table->string('nama', 35);
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->unsignedBigInteger('id_kelas'); // Tipe data sesuai dengan 'kelas'
            $table->unsignedBigInteger('id_spp');   // Tipe data sesuai dengan 'spp'
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
            $table->foreign('id_spp')->references('id_spp')->on('spp')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
