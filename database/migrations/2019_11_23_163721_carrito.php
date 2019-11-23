<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('carrito', function (Blueprint $table){
        $table->engine = 'InnoDB';
        $table->BigIncrements('id');
        $table->increments('usuario_id');
        $table->increments('producto_id');
        $table->foreign('usuario_id')->references('id')->on('users');
        $table->foreign('producto_id')->references('id')->on('productos');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
