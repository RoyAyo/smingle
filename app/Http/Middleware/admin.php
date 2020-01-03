<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class admin
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
        if (Auth::user()->email != "roylayindeay0@gmail.com") {
            return redirect()->back();
        }

        return $next($request);
    }
}
