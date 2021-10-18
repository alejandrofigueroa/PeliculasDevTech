<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_peliculas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelicula_id');
            $table->string('sinopsis');
            $table->string('genero');
            $table->string('director');
            $table->timestamps();

            $table->foreign('pelicula_id')->references('id')->on('peliculas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_peliculas');
    }
}
