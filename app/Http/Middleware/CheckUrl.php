<?php

namespace App\Http\Middleware;

use Closure;

use DB;

class CheckUrl
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
        $role_data = DB::table('assign')
                ->where('user_id' , $userId)->where('blog_id' , $blog)->count();
                if(!$role_data)
                {
                    return redirect('/home');
                }

        return $next($request);
    }
}



