<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id('menu_id');
            $table->unsignedBigInteger('tempat_id');
            $table->string('nama_menu');
            $table->text('deskripsi')->nullable();

            $table->foreign('tempat_id')
                ->references('tempat_id')
                ->on('tempat_kuliner')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
