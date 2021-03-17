<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Is_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('LoggedAdmin')) {
            return redirect()->back();
        }
        return $next($request);
    }
}