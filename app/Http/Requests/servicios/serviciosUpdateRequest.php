<?php

namespace JAT\Http\Requests\servicios;

use JAT\Http\Requests\Request;

use Illuminate\Routing\Route;

class serviciosUpdateRequest extends Request
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
            'nombre'=>'required|min:3|unique:servicios,nombre,'.$this->route->getparameter('servicios'),
        ];
    }
}
