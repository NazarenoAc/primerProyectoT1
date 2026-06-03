<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'usuario_id',
        'producto_id',
        'tipo',
        'estado',
        'cantidad',
        'detalle',
        'cliente_nombre',
        'cliente_email',
        'cliente_telefono',
        'envio_direccion',
        'envio_ciudad',
        'envio_provincia',
        'envio_codigo_postal',
        'metodo_pago',
        'precio_unitario',
        'subtotal',
    ];

    protected $casts = [
        'cantidad' => 'integer',
        'precio_unitario' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
