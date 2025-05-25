<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
        $papel = Auth::user()->papel;

        if ($papel === 'cliente') {
            return redirect()->route('dashboard.cliente');
        } elseif ($papel === 'cuidador') {
            return redirect()->route('dashboard.cuidador');
        }
    }

        return $next($request);
    }
}
