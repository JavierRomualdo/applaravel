<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ventas', function(Blueprint $table){
          $table->increments('id');
          $table->integer('idPropiedad')->unsigned();
          $table->integer('idPersona')->unsigned();
          $table->date('fechaVenta');
          $table->decimal('valoracion', 11, 2);
          $table->string('tipoPago', 30);

          //$table->primary('idVenta');
          $table->foreign('idPropiedad')->references('id')->on('propiedades');
          $table->foreign('idPersona')->references('id')->on('persona');
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
        Schema::drop('ventas');
    }
}
