<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    public $table = "carritos";
    public $id = "id";
    public $timestamps = False;
    public $guarded = [];

    public function user()
    {
      return $this->hasOne(User::class, 'usuario_id');
    }

}
