<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        /*
        |--------------------------------------------------------------------------
        | Belum login
        |--------------------------------------------------------------------------
        */

        if (!auth()->check()) {

            return redirect('/login');

        }

        /*
        |--------------------------------------------------------------------------
        | Role tidak sesuai
        |--------------------------------------------------------------------------
        */

        if (!in_array(auth()->user()->role, $roles)) {

            abort(403, 'ANDA TIDAK MEMILIKI AKSES');

        }

        return $next($request);
    }
}