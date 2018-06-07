<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FechaRequest extends Request
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
    public function rules(){

        
            $valueins = $this->checkField(Request::get('FechaInstalacion'));
            $valueeve = $this->checkField(Request::get('FechaEvento'));
        
        
        return [
            'FechaInstalacion'          =>$valueins,//'max:50|required|date|before:today',
            'FechaEvento'               =>$valueeve,//'max:50|required|date|after:FechaInstalacion',
            'HoraInstalacion'          =>'max:50|required|string',
            'FechaDesmontado'          =>'max:50|required|date',
            'HoraDesmontado'          =>'max:50|required'
            


            
        ];
    }
    protected function checkField($fecha){
        //dd($fecha);
        $hoy = getdate();
        $dia=((strlen($hoy['mday']))==1)?('0').($hoy['mday']):($hoy['mday']);//(((
        
      // dd($fecha." ".($hoy['year']."/".$hoy['mon']."/".$dia));
        if($fecha>=($hoy['year']."/".$hoy['mon']."/".$dia)){
            
            return  'max:50|required|date';    
        }else{
            return 'max:50|required|date';    
        }
        
        // this could be a switch or any conditional logic and then based on condition return string  
        
    }
}
