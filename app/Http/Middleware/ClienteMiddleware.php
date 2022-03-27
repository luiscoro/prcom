<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClienteMiddleware
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
         if(auth()->check() && (auth()->user()->hasRole('Client') || auth()->user()->hasRole('Admin')) )
          {  
              if(auth()->check() && auth()->user()->estado_cuenta=="baneada")
                return redirect()->route('home.cuentaBaneada');
           
         return $next($request);
        } else
        
            //sino redirigir a login
        return redirect()->route('login');
    }
}
