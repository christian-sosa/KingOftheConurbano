<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  public $table = "productos";
  public $timestamps = False;
  public $guarded = [];

  public function categoria()
  {
    return $this->belongsTo(Categoria::class, 'categoria_id');
  }

}
