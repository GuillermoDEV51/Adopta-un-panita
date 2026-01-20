<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $usuario = $request->user();

        if (!$usuario || !$usuario->role) {
            abort(403, 'Acceso no autorizado.');
        }

        $roleName = $usuario->role->name ?? null;

        if (!in_array($roleName, $roles)) {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
