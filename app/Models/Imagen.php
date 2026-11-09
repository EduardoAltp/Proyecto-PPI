<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = ['ruta', 'nombre_original'];
    public function imageable() { return $this->morphTo(); }
}
