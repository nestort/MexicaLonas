<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costo extends Model{
	protected $table="costos";

	protected $primaryKey='IdCostos';
	protected $fillable =['CostoTotal','SaldoDeudor'];

	public function Evento(){
		return $this->hasOne('App\Evento');
	}
	public function PagosPaciales(){
		return $this->hasMany('App\PagoParcial');
	}
}
