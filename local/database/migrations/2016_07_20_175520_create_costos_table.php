<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costos', function (Blueprint $table) {
            $table->increments('IdCostos');
            $table->double('CostoTotal',7,2);
            $table->double('SaldoDeudor',7,2);
            
           

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
        Schema::drop('costos');
    }
}
