<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        if (auth()->check()){

            switch (auth::user()->tipo_empleado) {
                case 'A':
                    return $next($request);
                    break;
                case 'C':
                    return redirect()->route('cocina.index');
                    break;
                default:
                    return redirect()->back();
                    break;
            }
            
            
        }
        
    }
}
