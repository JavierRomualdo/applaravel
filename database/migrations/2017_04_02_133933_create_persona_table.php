<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('persona', function(Blueprint $table){
          $table->increments('id');
          $table->string('nombres', 50);
          $table->string('apellidos', 50);
          $table->string('email', 100);
          $table->string('clave', 50);
          $table->string('telefono', 12);

          //$table->primary('idPersona');
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
        Schema::drop('persona');
    }
}
