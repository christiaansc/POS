<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'cliente_id', 'user_id','descuento', 'total','stado','fecha_venta',  'metodo_pago',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function ventaDetalle()
    {
        return $this->hasMany(VentaDetalle::class);

    }
}
