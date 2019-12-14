<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_usuario', function (Blueprint $table){
          $table->engine = 'InnoDB';
          $table->bigIncrements('id');
          $table->bigInteger('producto_id')->unsigned()->index();
          $table->foreign('producto_id')->references('id')->on('productos');
          $table->bigInteger('usuario_id')->unsigned()->index();
          $table->foreign('usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('producto_usuario');
    }
}
