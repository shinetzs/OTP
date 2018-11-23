<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/admin/dashboard');
        }else{ //proteccion de cuentas middlaware laravel
            return redirect()->action('MainController@login')->with('flash_message_error','Acceso Restringido');
        }

        return $next($request);
    }
}
