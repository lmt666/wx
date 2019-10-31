<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewareTest
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
        return response(['title'=>'test','article'=>'this is a test'],405);
        //return $next($request);
    }
}
