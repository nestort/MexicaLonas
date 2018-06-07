<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model{
    protected $table="fechas";
    protected $primaryKey='IdFecha';
	
    protected $fillable=['IdFecha','FechaInstalacion','HoraInstalacion','FechaEvento','FechaDesmontado','HoraDesmontado'];

    public function Eventos(){
    	return $this->hasOne('App\Eventos');
    }
}
