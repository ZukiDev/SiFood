<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriasTable extends Migration
{
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id('kriteria_id');
            $table->string('nama_kriteria');
            $table->float('bobot')->default(1.0);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
}
