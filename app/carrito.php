<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    public $table = "carritos";
    public $id = "id";
    public $timestamps = False;
    public $guarded = [];
}
