<?php

namespace App\Http\Middleware;

use Closure;

class CheckHakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $hak_akses)
    {
        if($request->user()->hak_akses == $hak_akses)
        {
            return $next($request);    
        }
        
        return redirect('/');
    }
}
