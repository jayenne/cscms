<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (
            Auth::check() &&
            Auth::user()->hasAnyRole(['developer', 'admin', 'editor', 'author'])
        ) {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->hasAnyRole(['member'])) {
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }
}
