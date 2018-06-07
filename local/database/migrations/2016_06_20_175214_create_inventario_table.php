<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->increments('IdInventario');
            $table->enum('Tipo',['Auditorio','Toldo','Enlonado']);
            $table->double('Ancho');//longuitud 3
            $table->double('Largo');//longuitud 3
            $table->double('Alto');//longuitud 3
            

            $table->text('Notas');
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
        Schema::drop('inventario');
    }
}
