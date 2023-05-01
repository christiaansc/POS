<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
