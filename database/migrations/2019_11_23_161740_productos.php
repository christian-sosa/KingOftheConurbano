<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table){
          $table->engine = 'InnoDB';
          $table->BigIncrements('id');
          $table->string('nombre');
          $table->float('precio');
          $table->longText('descripcion');
          $table->string('imagen');
          $table->boolean('en_oferta')->nullable();
          $table->integer('categoria_id');
          $table->timestamps();
          $table->foreign('categoria_id')->references('id')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('productos');
    }
}
