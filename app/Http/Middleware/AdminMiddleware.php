<?php

namespace JAT\Http\Middleware;
use Illuminate\Support\Facades\Auth;
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
      if(Auth::User()->email=='javierromualdo@hotmail.com'){
        return $next($request);
      } else {
        return abort(403);
      }
    }
}
