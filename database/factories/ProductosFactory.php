<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        "nombre" => $faker->word(),
        "descripcion" => $faker->paragraph(),
        "precio" => $faker->numberBetween(800,4000),
        "imagen" => $faker->image('public/storage',640,480, null, false),
        'categoria_id' => function () {
          return factory(App\Categoria::class)->create()->id;
        },
      ];
});
