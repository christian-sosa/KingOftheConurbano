<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    public $table = "categorias";
    public $id = "id";
    public $timestamps = False;
    public $guarded = [];
}
