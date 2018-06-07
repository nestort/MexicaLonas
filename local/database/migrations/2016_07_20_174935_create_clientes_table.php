<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {            
            $table->increments('IdCliente');
            $table->string('NombreCompleto');
            $table->string('Direccion');
            $table->string('Colonia');
            $table->string('Ciudad');
            $table->string('RFC',13);
            $table->integer('TelefonoFijo');
            $table->integer('TelefonoMovil');
            $table->string('Email');
            $table->string('NombreContacto',50);
            $table->integer('TelefonoMovilContacto');
            $table->string('Referencia');
            $table->enum('PorcentajeDescuento',['0','5','10','15','20','25','30','40','50','60','70'])->default('0');
            //$table->string('PorcentajeDescuento');
            $table->integer('Credito');
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
        Schema::drop('clientes');
    }
}
