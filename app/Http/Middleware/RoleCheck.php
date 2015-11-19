<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleCheck
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
        if(Auth::user()['user_role']==3)
        {
             if(strpos($request->url(),'create'))
                return "Forbidden";
        }
        
        return $next($request);
    }
}
