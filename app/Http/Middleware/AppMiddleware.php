<?php

namespace App\Http\Middleware;

use App\Models\Information;
use Closure;
use Illuminate\Support\Facades\View;

class AppMiddleware
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
        config(['translatable.locale' => $request->session()->get('applocale')]);

        View::share([
            'request' => $request,
            'information' => Information::first(),
            'locale'   => config('app.locale'),
            'locales' => config('laravellocalization.supportedLocales'),
        ]);

        return $next($request);
    }
}