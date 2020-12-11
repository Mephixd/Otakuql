<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeGeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_genero', function (Blueprint $table) {
            $table->unsignedBigInteger('id_anime');
            $table->unsignedBigInteger('id_genero');
            $table->foreign('id_anime')->references('id')->on('anime')->onDelete('cascade');
            $table->foreign('id_genero')->references('id')->on('genero')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_genero');
    }
}
