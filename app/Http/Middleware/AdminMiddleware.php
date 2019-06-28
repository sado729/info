<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminMiddleware
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
        abort_if(!($user = Auth::user()), 404);

        View::share([
            'request'  => $request,
            'admin'    => $user,
            'locale'   => config('app.locale'),
            'locales' => config('laravellocalization.supportedLocales'),
        ]);

        return $next($request);
    }
}
