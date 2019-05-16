<?php

namespace App\Http\Middleware;

use Closure;

class WevoUsersMiddleware
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
        if(!auth()->guard('WivoUsers')->check()){
            return redirect('/');
        }
        return $next($request);
    }
}
