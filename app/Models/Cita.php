<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = ['folio','user_id','auto_id','fecha','nombre_contacto',
                       'telefono_contacto','email_contacto','comentarios','estatus'];
    protected $casts = ['fecha' => 'datetime'];
    public function user() { return $this->belongsTo(User::class); }
    public function auto() { return $this->belongsTo(Auto::class); }
}
