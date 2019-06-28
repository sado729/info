<?php

namespace App\Http\Middleware;

use Closure;

class MinifyHtml
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * 
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response->setContent(
            preg_replace(
                [
                    '/ {2,}+/',
                    '/<!--.*?-->|\t|(?:\r?\n[\t]*)+/s',
                    '/> {2,}+</'
                ],
                [' ', '', '><'],
                $response->getContent()
            )
        );
    }
}
