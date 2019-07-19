<?php

namespace Equivalencias\Http\Middleware;

use Equivalencias\MatterUser;
use Auth;
use Closure;

class Matter_User
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
        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->first();
        if (isset($matter)){
            return $next($request);
        }
        return redirect()->route('home');
    }
}
