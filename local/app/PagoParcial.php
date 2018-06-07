<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoParcial extends Model{
	protected $table="pagosparciales";
	protected $primarykey='IdPagosParciales';
	protected $fillable=['Pago','TipoPago'];    

	public function Costo(){
		return $this->belongsTo('App\Costo');
	}
}
