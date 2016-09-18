<?php

namespace App\Http\Middleware;

use Closure;

class myhomeMiddleware
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
        $aaa = true;
        if ( $aaa) {
            dd('run stop');
        }

        return $next($request);
    }
}
