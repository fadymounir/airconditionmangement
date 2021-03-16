<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class userTypeAdmin
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
        if(Auth::user()->type == "admin") return $next($request);

        abort(403);
    }
}
