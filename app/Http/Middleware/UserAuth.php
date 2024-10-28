<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $userRole = $request->user()->role ;
        // super admin 
        if($userRole == 0){
            return $next($request); // super admin 
        }elseif($userRole == 1){
            return redirect()->route('dashboard'); // admin 
        }elseif($userRole == 2){
            return redirect()->route('customer-dashboard'); // normal user 
        }elseif($userRole == 3){
            return redirect()->route('volunteer-dashboard'); // normal user 
        }
    }
}