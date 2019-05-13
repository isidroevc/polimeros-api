<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarTablaMovimient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('movimiento', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idProducto');
            $table->enum('tipo', ['Entrada', 'Salida']);
            $table->decimal('cantidad', 10,2);
            $table->dateTime('fechaHora');

            $table->foreign('idProducto')->references('id')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
