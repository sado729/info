<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Carbon\Carbon;
use Closure;
use Exception;
use Jenssegers\Agent\Agent;

class TrackerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return \Illuminate\Http\Response
     */
    public function handle($request, Closure $next)
    {
        $agent = new Agent;

        if (! $agent->isRobot()) {
            $time = Carbon::now();

            $visitor = Visitor::firstOrNew([
                'session'    => $request->session()->getId(),
                'platform'   => $agent->platform(),
                'browser'    => $browser = $agent->browser(),
                'version'    => $agent->version($browser),
                'ip'         => $request->ip(),
                'created_at' => $time->format('Y-m-d'),
            ]);

            $visitor->visited_at = $time;

            try {
                $visitor->save();
            } catch (Exception $exception) {
                //
            }
        }

        return $next($request);
    }
}
