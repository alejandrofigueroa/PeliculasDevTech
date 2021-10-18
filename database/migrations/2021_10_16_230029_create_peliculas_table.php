<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->string('foto')->nullable();
            $table->string('fecha_estreno');
            $table->unsignedBigInteger('categoria_id');
            $table->integer('disponible');
            $table->integer('stock');
            $table->decimal('precio_renta', $precision = 8, $scale = 2)->nullable();
            $table->decimal('precio_compra', $precision = 8, $scale = 2)->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
