<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, string $rol): Response
    {
        $usuario = $request->user();

        if (! $usuario) {
            abort(403, 'No tenes permisos para acceder a esta seccion.');
        }

        $usuario->loadMissing('rol');

        $tieneRolPorNombre = $usuario->rol && $usuario->rol->nombre === $rol;
        $tieneRolPorId = ctype_digit($rol) && (int) $usuario->rol_id === (int) $rol;

        if (! $tieneRolPorNombre && ! $tieneRolPorId) {
            abort(403, 'No tenes permisos para acceder a esta seccion.');
        }

        return $next($request);
    }
}
