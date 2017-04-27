<?php

namespace JAT\Http\Requests\persona;

use JAT\Http\Requests\Request;

class personaCreateRequest extends Request
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
            'nombres'=>'required|min:3',
            'apellidos'=>'required|min:3',
            'email'=>'required|min:15|unique:persona,email',
            'telefono'=>'required|min:6',
            'clave'=>'required|min:6',
        ];
    }

    public function messages()
    {
      # code...
      return [
        'email.unique'=>'El cliente ya ha sido registrado [email registrado]',
      ];
    }
}
