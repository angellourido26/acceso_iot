<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle($request, Closure $next, ...$roles)
        {
            $usuario = session('usuario');

            if (!$usuario || !in_array($usuario->rol_id, $roles)) {
                abort(403, 'No autorizado');
            }

            return $next($request);
        }
}
