<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $fillable = [     
        'nombre',
        'detalle',
        'monto',
        'fechaGasto',
        'cantidad',
        'tipo_gasto',
        'montoTotal',
        'estado',
        ];
}
