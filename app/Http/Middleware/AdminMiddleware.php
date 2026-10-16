<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only signed-in users with the administrator role may pass.
        if (! Auth::check() || (int) Auth::user()->role_as !== 1) {
            return redirect('/')->with('error', 'Access denied! You are not allowed to access this page.');
        }

        return $next($request);
    }
}
