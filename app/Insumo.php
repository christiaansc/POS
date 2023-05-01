<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $fillable = [     
        'nombre',
    
        'stock',
        'tipo_insumo',
        
        'estado',
        ];
}
