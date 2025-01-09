<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppTable extends Migration
{
    public function up()
    {
        Schema::create('spp', function (Blueprint $table) {
            $table->id('id_spp');
            $table->integer('nominal');
            $table->year('tahun'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spp');
    }
}
