<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        if (!in_array(Auth::user()->role, $roles)) {
            return redirect()->route('beranda')->with('error', 'Anda tidak punya akses ke halaman ini.');
        }

        return $next($request);
    }
}
