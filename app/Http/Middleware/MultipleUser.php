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
       //dd($request->user(),$roles);
        $user = $request->user();
        if(isset($user) && in_array($user->role,$roles, true)){
            
            return $this->setResponse($next($request));
        }
        //return $next($request);
        return redirect('/');
    }

    public function setResponse($response)
    {
        $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma','nocache');
        $response->headers->set('Expires','Sat, 01 Jan 1990 00:00:00 GMT');
        return $response;
    }
}
