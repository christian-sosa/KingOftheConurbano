<?php

use Illuminate\Database\Seeder;

class usuario_admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('admin'),
        'es_admin' => 1,
        'fecha_nac' => '1999-12-31',
      ]);
    }
}
