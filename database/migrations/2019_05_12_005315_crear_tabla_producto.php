<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('producto', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idProveedor');
            $table->string('nombre');
            $table->decimal('cantidadExistencia', 10, 2);
            $table->string('unidadMedida');
            $table->decimal('puntoReorden', 10, 2);
            $table->integer('entradas')->default(0);
            $table->integer('salidas')->default(0);

            

            $table->foreign('idProveedor')->references('id')->on('proveedor');
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
