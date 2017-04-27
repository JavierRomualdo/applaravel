<?php

namespace JAT\Models\Inmobiliaria;

use Illuminate\Database\Eloquent\Model;

class personapropiedad extends Model
{
    //
    protected $table='personapropiedad';
    protected $primarykey='id';
    public $timestamps=false;

    protected $fillable=[
      'id', 'idPersona', 'idPropiedad'
    ];

    public function persona()
    {
      # code...
      return $this->hasmany(persona::class);
    }

    public function propiedades()
    {
      # code...
      return $this->hasmany(propiedades::class);
    }
}
