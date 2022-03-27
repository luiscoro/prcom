<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
         //si esta iniciado sesion y tiene el rol de cliente entonces de paso a la ruta que busca
         if(auth()->check() && auth()->user()->hasRole('Admin'))
            return $next($request);
        
            //sino redirigir a login
        return redirect()->route('login');
    }
}
