<?php

namespace App\Http\Middleware;

use Sentinel;
use Closure;

class LoggedInMiddleware
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

        if ($user=Sentinel::check()){
            return $next($request);
        }
        return redirect('/');
    }
}
