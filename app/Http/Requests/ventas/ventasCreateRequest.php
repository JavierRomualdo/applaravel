<?php

namespace JAT\Http\Requests\ventas;

use JAT\Http\Requests\Request;

class ventasCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'idPropiedad'=>'required|not_in:0|unique:ventas,idPropiedad',
            'fechaVenta'=>'required|min:8',
            'valoracion'=>'required|min:3',
            'tipoPago'=>'required|min:3',
        ];
    }

    public function messages()
    {
      # code...
      return [
        'idPersona.not_in'=>'El campo Cliente es obligatorio.',
        'idPropiedad.not_in'=>'El campo Propiedad es obligatorio.',
        'idPropiedad.unique'=>'La Propiedad ha sido vendida.',
      ];
    }
}
