<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProveeedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proveedor', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefonoOficina');
            $table->string('correoElectronico');
            $table->string('domicilio');
            $table->string('razonSocial');

            
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
