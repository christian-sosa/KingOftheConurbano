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
        // $this->call(llenar_db::class);
        factory(App\Categoria::class, 2)->create();
        factory(App\Producto::class, 50)->create();
    }
}
