<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroMarca extends Model
{
    protected $table = 'marcas';
    protected $fillable = [
        'id',
        'marca',
        'fecha_registro',
        'usuario_registro',
        'estado',
        'observaciones',
    ];

    
}
