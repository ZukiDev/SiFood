<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferensiGuestsTable extends Migration
{
    public function up()
    {
        Schema::create('preferensi_guest', function (Blueprint $table) {
            $table->id('preferensi_id');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->text('urutan_kriteria')->nullable();

            $table->foreign('kategori_id')
                ->references('kategori_id')
                ->on('kategori')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preferensi_guest');
    }
}
