<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasTable extends Migration
{
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->id('id_petugas');
            $table->string('username', 25)->unique();
            $table->string('password', 255);
            $table->string('nama_petugas', 35);
            $table->enum('level', ['admin', 'petugas']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}
