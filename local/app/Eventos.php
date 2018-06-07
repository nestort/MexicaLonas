<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model {
    
    protected $table='eventos';
   
    protected $primaryKey='IdEvento';
    protected $fillable=['IdEvento','TipoEvento','Direccion','Colonia','Ciudad','IdCliente','IdCosto','IdFecha','IdInstalador','IdUsuario','Notas'];

    





    public function cliente(){
    	return $this->belongsTo('App\Cliente');
    }
    public function costo(){
    	return $this->belongsTo('App\Costo','IdCosto');
    }
    public function Instalador(){
    	return $this->belongsTo('App\Instalador');
    }
    public function Fecha(){
    	return $this->belongsTo('App\Fecha','IdFecha');
    }
    public function Usuario(){
    	return $this->hasOne('App\User');
    }
    public function Inventario(){
		return $this->belongsToMany('App\Inventario')->withTimestamps();
    }
    

}
