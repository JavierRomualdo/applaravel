<?php

namespace JAT\Http\Requests\ventas;

use JAT\Http\Requests\Request;
use Illuminate\Routing\Route;

class ventasUpdateRequest extends Request
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
            'idPersona'=>'required|not_in:0',
            'idPropiedad'=>'required|not_in:0|unique:ventas,idPropiedad,'.$this->route->getparameter('ventas'),
            'fechaVenta'=>'required|min:8',
            'valoracion'=>'required|min:3',
            'tipoPago'=>'required|min:3',
        ];
    }

    public function messages()
    {
      # code...
      return [
        'idPersona'=>'El campo Cliente es obligatorio',
        'idPropiedad.not_in'=>'El campo Propiedad es obligatorio',
        'idPropiedad.unique'=>'La Propiedad ha sido vendida',
      ];
    }
}
