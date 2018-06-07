<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
	protected $primaryKey='IdCliente';
    protected $table="clientes";    
    protected $fillable=['NombreCompleto','Direccion','Colonia','Ciudad','RFC','TelefonoFijo','TelefonoMovil','Email','NombreContacto','TelefonoMovilContacto','Referencia','PorcentajeDescuento','Credito','Notas'];



    public function Eventos(){
    	return $this->hasMany('App\Evento');
    }
}
