<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
class GuestMiddleware
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
            return redirect('/');
        }
        return $next($request);
    }
}
