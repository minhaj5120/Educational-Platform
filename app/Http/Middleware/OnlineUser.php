<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Carbon\Carbon;
use Cache;
use App\Models\User;

class OnlineUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check()))
        {
            $expiredtime=Carbon::now()->addMinutes(1);
            Cache::put('OnlineUser'.Auth::user()->id,true,$expiredtime);
            $getUserInfo=User::getSingle(Auth::user()->id);
            $getUserInfo->updated_at=date('Y-m-d H:i:s');
            $getUserInfo->save();
        }
        return $next($request);
    }
}
