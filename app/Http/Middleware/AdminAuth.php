<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Corrected the Auth::guard method call
        if (! Auth::guard('admin')->check()) {
            // Redirect to the admin login page instead of returning a view directly
            return redirect()->route('admin.login');  // Assuming you have a named route 'admin.login'
        }

        return $next($request);
    }
}

