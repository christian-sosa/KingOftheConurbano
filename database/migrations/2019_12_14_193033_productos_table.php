<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductosTable extends Migration
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
