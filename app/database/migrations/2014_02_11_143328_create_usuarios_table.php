<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('rut', 45)->unique()->nullable();
            $table->string('ciudad', 45)->nullable();
            $table->string('email', 64)->unique();
            $table->boolean('recibir_info')->default(0);
            $table->biginteger('uid')->unsigned();
            $table->string('access_token')->nullable();
            $table->string('access_token_secret')->nullable();
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
        Schema::drop('usuarios');
    }

}
