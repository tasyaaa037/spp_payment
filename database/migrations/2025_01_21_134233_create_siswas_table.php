<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nisn');
            $table->bigInteger('nis');
            $table->string('nama');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->text('alamat');
            $table->bigInteger('no_hp');
            $table->foreignId('spp_id')->constrained('spps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
