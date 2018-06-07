<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosparcialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagosparciales', function (Blueprint $table) {
            $table->increments('IdPagosParciales');
            $table->integer('IdCosto')->unsigned();
            $table->foreign('IdCosto')->references('IdCostos')->on('costos');
            $table->double('Pago');
            $table->enum('TipoPago',['Efectivo','Deposito']);
            $table->timestamps();
            
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pagosparciales');
    }
}
