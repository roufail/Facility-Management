<?php

namespace App\Http\Middleware;

use Closure;

class ManagerMiddleWare
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
        if(auth()->user()->role->id == 7){
            return redirect()->route('events.index');
        }
        return $next($request);
    }
}
