<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos_Inventario extends Model {
    
    protected $table='eventos_inventario';
   
    protected $primarykey='id';
    protected $fillable=['inventario_id','eventos_id'];

    

}
