<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'asunto',
        'mensaje',
        'estado',
    ];
}
