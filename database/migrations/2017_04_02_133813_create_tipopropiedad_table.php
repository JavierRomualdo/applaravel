<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipopropiedadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tipopropiedad', function(Blueprint $table){
          $table->increments('id');
          $table->string('nombre', 50);
          $table->string('descripcion', 100);

          //$table->primary('idUsuario');
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
        Schema::drop('tipopropiedad');
    }
}
