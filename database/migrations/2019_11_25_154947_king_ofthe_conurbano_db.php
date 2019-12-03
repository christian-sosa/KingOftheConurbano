<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KingOftheConurbanoDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categorias', function (Blueprint $table){
        $table->engine = 'InnoDB';
        $table->bigIncrements('id');
        $table->string('nombre');
      });
      Schema::create('productos', function (Blueprint $table){
        $table->engine = 'InnoDB';
        $table->bigIncrements('id');
        $table->string('nombre');
        $table->float('precio');
        $table->longText('descripcion');
        $table->string('imagen');
        $table->boolean('en_oferta')->nullable();
        $table->bigInteger('categoria_id')->unsigned()->index();
        $table->timestamps();
        $table->foreign('categoria_id')->references('id')->on('categorias');

      });

      Schema::create('carrito', function(Blueprint $table){
        $table->engine = 'InnoDB';
        $table->bigIncrements('id');
        $table->bigInteger('usuario_id')->unsigned()->index();
        $table->bigInteger('producto_id')->unsigned()->index();
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
