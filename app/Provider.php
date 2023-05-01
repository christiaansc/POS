<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [     
        'nombre',
        'correo',
        'direccion',
        'ruc_number',
        'telefono',
        ];
}
