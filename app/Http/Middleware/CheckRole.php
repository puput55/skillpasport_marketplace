<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        if (Auth::user()->role !== $role) {
             return redirect()->route('beranda')->with('error', 'Anda tidak punya akses ke halaman ini.');
        }

         return $next($request);
    }
}
