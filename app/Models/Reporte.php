<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'user_id',
        'ubicacion',
        'descripcion',
        'fecha_inicio',
    ];
}
