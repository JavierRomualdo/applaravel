<?php

namespace JAT\Models\Inmobiliaria;

use Illuminate\Database\Eloquent\Model;

class servicios extends Model
{
    //
    protected $table='servicios';
    protected $primarykey='id';//idServicio
    public $timestamps=false;

    protected $fillable=[
      'id', 'nombre', 'descripcion'
    ];

    public function propiedades()
    {
      # code...
      return $this->belongsto(propiedades::class);
    }
}
