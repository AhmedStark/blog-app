<?php

namespace App\Http\Middleware;

use Sentinel;
use Closure;

class AdminMiddleware
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
        $user=Sentinel::getUser();
        if (!$user->inRole('admin')){
            return redirect('/');
        }
        return $next($request);

    }
}
