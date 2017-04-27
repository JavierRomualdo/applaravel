<?php

namespace JAT\Models\Inmobiliaria;

use Illuminate\Database\Eloquent\Model;

class tipopropiedad extends Model
{
    //
    protected $table='tipopropiedad';
    protected $primarykey='id';
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
