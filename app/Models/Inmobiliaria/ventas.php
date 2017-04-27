<?php

namespace JAT\Models\Inmobiliaria;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    //
    protected $table='ventas';
    protected $primarykey='id';
    public $timestamps=false;

    protected $fillable=[
      'id', 'idPropiedad', 'fechaVenta', 'idPersona', 'valoracion', 'tipoPago'
    ];

    public function propiedades($value='')
    {
      # code...
      return $this->hasmany(propiedades::class);
    }

    public function persona()
    {
      # code...
      return $this->hasmany(persona::class);
    }
}
