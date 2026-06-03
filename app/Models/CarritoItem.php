<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoItem extends Model
{
    protected $table = 'carrito_items';

    protected $fillable = [
        'usuario_id',
        'producto_id',
        'cantidad',
    ];

    protected $casts = [
        'cantidad' => 'integer',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function getSubtotalAttribute()
    {
        return (float) ($this->producto->precio ?? 0) * $this->cantidad;
    }
}
