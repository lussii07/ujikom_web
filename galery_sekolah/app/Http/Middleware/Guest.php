<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if an admin is logged in using the petugas guard
         if (Auth::check()) {
            return redirect()->route('admin.dashboard')->with('error', 'Admin tidak dapat mengakses halaman utama.');
        }

        return $next($request);
    }
}