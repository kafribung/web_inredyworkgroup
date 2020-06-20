<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $user = $request->user();

        if ($user) {
            if ($user->role == 1 || $user->role == 2 ) {
                if ($user->status == 2) {
                    return $next($request);
                }  else return abort('403', 'Status Belum Aktif');
            } else return abort('404');
        } else return abort('404');

    }
}
