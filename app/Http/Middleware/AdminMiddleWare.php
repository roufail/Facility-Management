<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleWare
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
        if(auth()->user()->role->id != 6){
            if(auth()->user()->role->id == 7){
                return redirect()->route('events.index');
            }else{
                return redirect()->route('events.approve');
            }
        }
        return $next($request);
    }
}
