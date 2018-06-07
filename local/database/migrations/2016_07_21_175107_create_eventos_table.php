<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration{    
    public function up(){
        Schema::create('eventos', function (Blueprint $table) {
            
            $table->increments('IdEvento');
            $table->string('TipoEvento');
            $table->string('Direccion');
            $table->string('Colonia');
            $table->string('Ciudad');           
            
            $table->integer('IdCliente')->unsigned();
            $table->integer('IdCosto')->unsigned();
            $table->integer('IdFecha')->unsigned();
            $table->integer('IdInstalador')->unsigned();
            $table->integer('IdUsuario')->unsigned();
            $table->text('Notas'); 

            $table->foreign('IdCliente')->references('IdCliente')->on('clientes')->onDelete('cascade');
            $table->foreign('IdCosto')->references('IdCostos')->on('costos')->onDelete('cascade');
            $table->foreign('IdFecha')->references('IdFecha')->on('fechas')->onDelete('cascade');
            $table->foreign('IdInstalador')->references('IdInstalador')->on('instaladores')->onDelete('cascade');
            $table->foreign('IdUsuario')->references('id')->on('users')->onDelete('cascade');
            
            
            $table->timestamps();
        });

        Schema::create('eventos_inventario',function(Blueprint $table){
            $table->increments('id');
            $table->integer('inventario_id')->unsigned();
            $table->integer('eventos_id')->unsigned();


            $table->foreign('inventario_id')->references('IdInventario')->on('inventario')->onDelete('cascade');
            $table->foreign('eventos_id')->references('IdEvento')->on('eventos')->onDelete('cascade');

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::drop('eventos_inventario');
        Schema::drop('eventos');
        
    }
}
