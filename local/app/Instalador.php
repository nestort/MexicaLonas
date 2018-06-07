<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instalador extends Model{
	protected $primaryKey='IdInstalador';
    protected $table="instaladores";
    protected $fillable=['Nombre','Equipo','Notas'];

    public function Eventos(){
    	return $this->hasMany('App\Evento');
    }
}
