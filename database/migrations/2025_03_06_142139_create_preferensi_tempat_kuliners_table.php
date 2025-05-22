<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferensiTempatKulinersTable extends Migration
{
    public function up()
    {
        Schema::create('preferensi_tempat_kuliner', function (Blueprint $table) {
            $table->id('preferensi_tempat_id');
            $table->unsignedBigInteger('tempat_id')->unique();

            $table->string('link_gmaps')->nullable();
            $table->string('link_gofood')->nullable();
            $table->string('link_shopeefood')->nullable();
            $table->string('link_grabfood')->nullable();

            $table->float('rating_google')->nullable();
            $table->float('rating_go_food')->nullable();
            $table->float('rating_shopee_food')->nullable();
            $table->float('rating_grab_food')->nullable();

            $table->integer('jumlah_makanan')->default(0);
            $table->integer('jumlah_minuman')->default(0);

            $table->foreign('tempat_id')
                ->references('tempat_id')
                ->on('tempat_kuliner')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preferensi_tempat_kuliner');
    }
}
