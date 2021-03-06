<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HomeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->estado_cuenta == "baneada")
            return redirect()->route('home.cuentaBaneada');


        return $next($request);
    }
}
