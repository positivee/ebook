<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;


class CheckBookstoreId
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

        if($request->user() && $request->user()->bookstore_id == null) {
            return new Response(view('unauthorized')->with('role', 'Pracownik Księgarni'));
        }

        return $next($request);
    }

}
