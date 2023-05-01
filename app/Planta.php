<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    
    protected $fillable = [     
        'detalle',
        'monto',    
        'accion',
        'fecha',
        'cantidad',
        'montoTotal',
        ];
}
