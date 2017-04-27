<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('propiedades', function(Blueprint $table){
          $table->increments('id');
          $table->string('direccion', 150);
          $table->string('descripcion', 100);
          $table->integer('idTipoPropiedad')->unsigned();
          $table->integer('idServicio')->unsigned();
          $table->string('image',50);

          //$table->primary('idPropiedad');
          $table->foreign('idServicio')->references('id')->on('servicios');
          $table->foreign('idTipoPropiedad')->references('id')->on('tipopropiedad');
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
        Schema::drop('propiedades');
    }
}
