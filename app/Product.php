<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [     
        'nombre',
        'stock',
        'descripcion',
        'precio',
        'estado',
        'categoria_id',
        ];

      
            
        public function categoria()
        {
            return $this->belongsTo(Categoria::class);
        }
}
