<?php

namespace JAT\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    //
    protected $table='usuarios';
    protected $primarykey='id';
    public $timestamps=false;

    protected $fillable=[
      'id', 'tipoUsuario', 'nombre', 'email', 'password'
    ];
}
