<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model{
	protected $primaryKey='IdInventario';
    protected $table="inventario";
    protected $fillable=['Tipo','Ancho','Largo','Alto','Notas'];
    public function Eventos(){
    	return $this->belongsToMany('App\Evento')->withTimestamps();
    }
}
