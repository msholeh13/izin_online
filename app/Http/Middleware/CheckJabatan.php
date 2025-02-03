<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckJabatan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        if (Auth::check() && Auth::user()->jabatan == $role) {
            return $next($request);
        }

        // if (Auth::check()) {
        //     if (in_array(Auth::user()->jabatan, $roles)) {
        //         return $next($request);
        //     }
        // }

        return redirect('/login')->withErrors(['message' => 'Anda tidak memiliki akses ke halaman ini.']);
    }
}
