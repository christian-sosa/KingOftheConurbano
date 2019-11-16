<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    public $table = "usuarios";
    public $id = "id"
    public $timestamps = False;
    public $guarded = [];
}
