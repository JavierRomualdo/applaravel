<?php

namespace JAT\Http\Requests\propiedades;

use JAT\Http\Requests\Request;

use Illuminate\Routing\Route;

class propiedadesUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function __construct(Route $route)
     {
       # code...
       $this->route=$route;
     }
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'idTipoPropiedad'=>'required|not_in:0',
            'idServicio'=>'required|not_in:0',
            'direccion'=>'required|min:3|unique:propiedades,direccion,'.$this->route->getparameter('propiedades'),
            'descripcion'=>'required|min:3',
        ];
    }

    public function messages()
    {
      # code...
      return [
        'idTipoPropiedad.not_in'=>'El campo TipoPropiedad es obligatorio.',
        'idServicio.not_in'=>'El campo Servicio es obligatorio',
      ];
    }
}
