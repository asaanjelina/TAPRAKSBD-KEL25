<?php

namespace App\Http\Middleware;

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PemilihMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'pemilih') {
            return $next($request);
        }

        abort(403, 'Akses ditolak');
    }
}