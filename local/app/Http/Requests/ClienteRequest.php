<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClienteRequest extends Request
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
            'NombreCompleto'          =>'max:50|required|string',
            'Direccion'               =>'max:100|required|string',
            'Colonia'                 =>'max:5000|required|string',
            'Ciudad'                  =>'max:300|string|required',
            'RFC'                     =>'max:13|string',
            'TelefonoFijo'            =>'numeric|required',

            'TelefonoMovil '          =>'numeric',
            'Email'                   =>'email|required',
            'NombreContacto'          =>'max:50|required|string',

            'TelefonoMovilContacto'   =>'numeric|required',
            'Credito'                 =>'required|numeric',
            'Notas'                   =>'max:50|string'

            
        ];
    }
}
