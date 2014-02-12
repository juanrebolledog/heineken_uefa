<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquiposCanjeados extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos_canjeados', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('equipo_id')->unsigned();
            $table->foreign('equipo_id')->references('id')->on('equipos')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('canje_id')->unsigned();
            $table->foreign('canje_id')->references('id')->on('codigos_canjeados')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipos_canjeados');
    }

}
