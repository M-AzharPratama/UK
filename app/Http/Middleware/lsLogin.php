<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class lsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
          } else {
           return redirect()->route('login')->with('canAccess', 'silahkan login terlebih dahulu');
          }
    }
}
