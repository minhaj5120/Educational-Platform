<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            $user = Auth::user();
            if($user->category == 1){
                return $next($request);           //next->admin dashboard
            }
            else{
                Auth::logout();
                return redirect("login");
            }

        }
        else{
            Auth::logout();
            return redirect("login");

        }
    }
}
