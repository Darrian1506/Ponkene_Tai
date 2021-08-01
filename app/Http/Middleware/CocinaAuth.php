<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CocinaAuth
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
                case 'C':
                    return $next($request);
                    break;
                case 'A':
                    return $next($request);
                    break;
                default:
                    return redirect()->back();
                    break;
            }
            
            
        }
    }
}
