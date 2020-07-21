<?php

namespace App\Http\Middleware;

use Closure;

class SiswaAuthenticated
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
      if(auth()->check()) {
        return $next($request);
      }

      return redirect()->route('siswa.login');
    }
}
