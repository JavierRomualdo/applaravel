<?php

namespace JAT\Models\Inmobiliaria;

use Illuminate\Database\Eloquent\Model;

class propiedades extends Model
{
    //
    protected $table='propiedades';
    protected $primarykey='id';
    public $timestamps=false;

    protected $fillable=[
      'id', 'direccion', 'descripcion', 'idTipoPropiedad', 'idServicio', 'image'
    ];

    public function servicios()
    {
      # code...
      return $this->hasmany(servicios::class);
    }

    public function tipoPropiedad()
    {
      # code...
      return $this->hasmany(tipopropiedad::class);
    }

    public function personaPropiedad()
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
