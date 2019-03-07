<?php

namespace App\Http\Middleware;

use Closure;

class webmaster_middleware
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
        if (auth()->check() && $request->user()->roles == ‘webmaster’ && $request->user()->status == ‘aktif’)
        {
        return redirect()->guest('adminkades');
        }
        return $next($request);
    }
}
