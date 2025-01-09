<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_petugas');
            $table->char('nisn', 10);
            $table->date('tgl_bayar');
            $table->string('bulan_dibayar', 8);
            $table->string('tahun_dibayar', 4);
            $table->unsignedBigInteger('id_spp');
            $table->integer('jumlah_bayar');
            $table->timestamps();

            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onDelete('cascade');
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');
            $table->foreign('id_spp')->references('id_spp')->on('spp')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
