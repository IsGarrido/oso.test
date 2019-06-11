<?php

namespace App\Http\Middleware;

use Closure;

class CheckBlocked
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
        if ($request->user() != null && $request->user()->is_blocked)
            return abort(401);
        //             return response("Cuenta bloqueada, contacte con el administrador admin@oso.test para más información", 401);


        return $next($request);
    }
}
