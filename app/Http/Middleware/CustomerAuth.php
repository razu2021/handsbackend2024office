<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomerAuth
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
        if($userRole == 2){
            return $next($request); // super admin 
        }elseif($userRole == 1){
            return redirect()->route('dashboard'); // admin 
        }elseif($userRole == 3){
            return redirect()->route('volunteer-dashboard'); // normal user 
        }elseif($userRole == 0){
            return redirect()->route('user-dashboard'); // normal user 
        }


    }
}
