<?php

namespace App\Http\Middleware;

use Closure;

class MultipleUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        //dd($request->user(),auth()->user());
        $user = $request->user();
        if(isset($user) && in_array($user->role,$roles, true)){
            return $next($request);
        }
        //return $next($request);
        return redirect('/');
    }
}
