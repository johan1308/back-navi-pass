<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * * Get the path the user should be redirected to when they are not authenticated.
     * @param $request
     * @return string|void
     */

    public function handle(Request $request, Closure $next)
    {
        // Aquí va la lógica de autenticación

        dd($request);
        if (!$request->user()) {

            return redirect()->route('verify');
        }
        return $next($request); // Continua si está autenticado
    }
    protected function redirectTo($request)
    {


        if (!$request->expectsJson()) {
            return route('verify');
        }
    }
}
