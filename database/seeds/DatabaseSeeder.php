<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(usuario_admin::class);
        factory(App\Categoria::class, 10)->create();
        factory(App\Producto::class, 50)->create();
    }
}
