<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiNormalisasisTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_normalisasi', function (Blueprint $table) {
            $table->id('normalisasi_id');
            $table->unsignedBigInteger('tempat_id');
            $table->unsignedBigInteger('kriteria_id');
            $table->float('nilai_normalisasi');

            $table->foreign('tempat_id')
                ->references('tempat_id')
                ->on('tempat_kuliner')
                ->onDelete('cascade');

            $table->foreign('kriteria_id')
                ->references('kriteria_id')
                ->on('kriteria')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_normalisasi');
    }
}
