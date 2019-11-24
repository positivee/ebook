<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class CheckUser
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

        if($request->user() && $request->user()->bookstore_id != null) {
            return new Response(view('unauthorized')->with('role', 'Użytkownik'));
        }


        return $next($request);
    }
}
