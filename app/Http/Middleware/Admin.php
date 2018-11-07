<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (auth()->user() &&  (auth()->user()->role->slug == "superadmin" || auth()->user()->role->slug == "admin")) {
            return $next($request);
        }
        if (auth()->user())
            return redirect('home');
        else
            return redirect('/');
    }
}
