<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
  public $table = "productos";
  public $id = "id";
  public $timestamps = False;
  public $guarded = [];
}
