<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $ip = $request->ip();
        // info($ip);
        // if($ip == "127.0.0.1:8000"){
        //     info($ip);
        //    abort(403);
        // }
        // abort(403);

        $user = auth()->user();
          
        if($user and $user->email == "george2@gmail.com"){
            return $next($request);
        }else {
            abort(403);
        }
       
       
       
    }
}
