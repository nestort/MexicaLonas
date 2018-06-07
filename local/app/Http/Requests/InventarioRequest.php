<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InventarioRequest extends Request
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
            'Ancho'          =>'max:5000|required|numeric',
            'Largo'          =>'max:5000|required|numeric',
            'Alto'          =>'max:5000|required|numeric',
            'Notas'          =>'max:300|string'



            
        ];
    }
}
