<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InstaladoresRequest extends Request
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
            'Nombre'          =>'min:4|max:50|required|unique:instaladores|string',
            'Equipo'          =>'max:300|string|required',
            'Notas'          =>'max:300|string'


            
        ];
    }
}
