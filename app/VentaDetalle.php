<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    protected $fillable = [
        'fecha_venta',           
        'precio',             
        'cantidad', 
        'descuento',                        
        'venta_id',             
        'product_id', 
        'user_id',             

    ];

 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
