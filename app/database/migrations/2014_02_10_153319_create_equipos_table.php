<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquiposTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->date('fundado');
            $table->integer('ranking_uefa');
            $table->string('campeon', 200);
            $table->string('abreviacion', 3);
            $table->integer('grupo');
            $table->boolean('activo')->default(1);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipos');
    }

}
