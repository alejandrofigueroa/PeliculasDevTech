<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pelicula_id');
            $table->string('accion');
            $table->time('fecha_transaccion');
            $table->time('fecha_renta_final')->nullable();//fecha final prevista por la propia pagina para alquilarla 
            $table->time('fecha_entrega')->nullable();//fecha cuando el usuario hace entrega de la pelicula alquilada
            $table->decimal('monto_pago', $precision = 8, $scale = 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('acciones');
    }
}
