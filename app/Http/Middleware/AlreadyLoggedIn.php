<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;

class AlreadyLoggedIn
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

        if ((session()->has('LoggedUser') || session()->has('LoggedAdmin')) && (url('login_form') == $request->url() || url('register_form') == $request->url())) {
            return back();
        }
        return $next($request);
    }
}
