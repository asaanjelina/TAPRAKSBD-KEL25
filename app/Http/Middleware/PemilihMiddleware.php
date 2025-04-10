<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PemilihMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->role === 'pemilih') {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Hanya untuk pemilih.');
    }
}
