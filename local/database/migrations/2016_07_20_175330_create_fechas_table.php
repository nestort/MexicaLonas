<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechas', function (Blueprint $table) {
            $table->increments('IdFecha');
            $table->date('FechaInstalacion');
            $table->time('HoraInstalacion');
            $table->date('FechaEvento');
            $table->date('FechaDesmontado');
            $table->time('HoraDesmontado');
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
        Schema::drop('fechas');
    }
}
