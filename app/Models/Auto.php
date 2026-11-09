<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;   

class Auto extends Model
{
    use SoftDeletes;
    use HasFactory;                            

    protected $fillable = [
        'modelo_id', 'anio', 'precio', 'kilometraje', 'color', 'transmision',
        'combustible', 'tipo', 'condicion', 'descripcion', 'estado', 'vin', 'folio',
    ];
    public function modelo() { return $this->belongsTo(Modelo::class); }
    public function citas() { return $this->hasMany(Cita::class); }
    public function favoritoDe() { return $this->belongsToMany(User::class, 'favoritos')->withTimestamps(); }
    public function imagenes() { return $this->morphMany(Imagen::class, 'imageable'); }
}