<?php

namespace JAT\Models\Inmobiliaria;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    //
    protected $table='persona';
    protected $primarykey='id';
    public $timestamps=false;

    protected $fillable=[
      'id', 'nombres', 'apellidos', 'email', 'clave', 'telefono'
    ];

    public function personaPropiedad($value='')
    {
      # code...
      return $this->belongsto(personapropiedad::class);
    }

    public function ventas()
    {
      # code...
      return $this->belongsto(ventas::class);
    }
}
