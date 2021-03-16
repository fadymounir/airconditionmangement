<?php

namespace App\Http\Middleware;

use App\Models\UserLog;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
class userType
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

        if(Auth::user()->type == "employe" || Auth::user()->type == "admin"){


            // we check if the user has been have user log or not
         if(Auth::user()->type == 'employe')
            if(UserLog::whereNULL('is_closed')->where('user_id','=',Auth::user()->id)->count() ==0)
                UserLog::addEdit(Auth::user()->id);

            return $next($request);
        }



        abort(403);

    }
}
