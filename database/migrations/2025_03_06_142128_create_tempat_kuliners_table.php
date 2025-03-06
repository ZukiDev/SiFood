<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempatKulinersTable extends Migration
{
    public function up()
    {
        Schema::create('tempat_kuliner', function (Blueprint $table) {
            $table->id('tempat_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('nama');
            $table->text('alamat');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);

            $table->foreign('kategori_id')
                ->references('kategori_id')
                ->on('kategori')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tempat_kuliner');
    }
}
