<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        $response = $next($request);
        //If the status is not approved redirect to login
        switch ($guard){
            default:
                if(Auth::check() && Auth::user()->status != '1'){
                    Auth::logout();
                    Alert::error('Təəssüf!','Sizin istifadəçi təsdiq olunmayıb');
                    return redirect('/login');
                }
                break;
        }

        return $response;
    }
}
