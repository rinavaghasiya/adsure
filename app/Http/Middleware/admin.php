<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

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
        if (Session::has('adminname')) {
            return $next($request);
        } else {
            return redirect('signin');
        }
    }
}
