<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerOnly
{
    public function handle($request, Closure $next)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Periksa apakah role pengguna adalah customer
        if (Auth::user()->role !== 'customer') {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
