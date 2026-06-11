<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ◄--- IMPORTANTE: Para que funcione el login
use Illuminate\Database\Eloquent\Factories\HasFactory;       // ◄--- IMPORTANTE: Para el borrado lógico

use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable 
{
    use HasFactory, SoftDeletes;

    protected $table = 'usuarios'; 

    protected $fillable = [
        'nombre', 
        'email', 
        'password', 
        'rol_id'
    ];

    protected $hidden = [
        'password', 
        'remember_token'
    ]; 

    protected $casts = [
        'password' => 'hashed',
    ];

    // Relación: un Usuario pertenece a un Rol → se usa como $usuario->rol
    public function rol() {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function carritoItems()
    {
        return $this->hasMany(CarritoItem::class, 'usuario_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }
}
