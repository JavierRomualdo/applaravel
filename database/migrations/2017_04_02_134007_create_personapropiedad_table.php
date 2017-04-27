<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonapropiedadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('personapropiedad', function(Blueprint $table){
          $table->increments('id');
          $table->integer('idPersona')->unsigned();
          $table->integer('idPropiedad')->unsigned();

          //$table->primary('idPropPersona');
          $table->foreign('idPersona')->references('id')->on('persona');
          $table->foreign('idPropiedad')->references('id')->on('propiedades');
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
        Schema::drop('personapropiedad');
    }
}
