<?php

namespace App\Http\Controllers\Admin\Concerns;

use App\Extensions\Date;
use App\Models\View;
use App\Models\Visitor;

trait Statistician
{
    /**
     * Get statistics for the last n days.
     *
     * @param int $n
     *
     * @return array
     */
    private static function getLastDays($n)
    {
        $lastDays = [
            'days'     => [],
            'visitors' => [],
            'views'    => [],
        ];

        $end   = Date::today()->addDay();
        $start = Date::today()->subDay($n);

        $visitors = Visitor::stat('date', $start, $end);
        $views    = View::stat('date', $start, $end);

        for ($i = $n; $i > 0; $i--) {
            $visitorsCount = $visitors->where('date', $date = $start->toDateString())->first();
            $viewsCount    = $views->where('date', $date)->first();

            $lastDays['days'][]     = $start->format('d');
            $lastDays['visitors'][] = $visitorsCount ? $visitorsCount->count : 0;
            $lastDays['views'][]    = $viewsCount ? $viewsCount->count : 0;

            $start->addDay();
            $end->addDay();
        }

        return $lastDays;
    }

    /**
     * Get statistics for the last n months.
     *
     * @param int $n
     *
     * @return array
     */
    private static function getLastMonths($n)
    {
        $lastMonths = [
            'months'   => [],
            'visitors' => [],
            'views'    => [],
        ];

        $days = date('d') - 1;

        $end   = Date::today()->subDay($days)->addMonth();
        $start = Date::today()->subDay($days)->subMonth($n - 1);

        $visitors = Visitor::stat('month', $start, $end);
        $views    = View::stat('month', $start, $end);

        for ($i = $n; $i > 0; $i--) {
            $visitorsCount = $visitors->where('date', $date = $start->format('n'))->first();
            $viewsCount    = $views->where('date', $date)->first();

            $lastMonths['months'][]   = __('time.'.$start->format('M'));
            $lastMonths['visitors'][] = $visitorsCount ? $visitorsCount->count : 0;
            $lastMonths['views'][]    = $viewsCount ? $viewsCount->count : 0;

            $start->addMonth();
            $end->addMonth();
        }

        return $lastMonths;
    }

    /**
     * Get statistics for the last 5 years.
     *
     * @param int $n
     *
     * @return array
     */
    private static function getLastYears($n)
    {
        $lastYears = [
            'years'    => [],
            'visitors' => [],
            'views'    => [],
        ];

        $days = date('z');

        $end   = Date::today()->subDay($days)->addYear();
        $start = Date::today()->subDay($days)->subYear($n - 1);

        $visitors = Visitor::stat('year', $start, $end);
        $views    = View::stat('year', $start, $end);

        for ($i = $n; $i > 0; $i--) {
            $visitorsCount = $visitors->where('date', $date = $start->format('Y'))->first();
            $viewsCount    = $views->where('date', $date)->first();

            $lastYears['years'][]    = $start->format('Y');
            $lastYears['visitors'][] = $visitorsCount ? $visitorsCount->count : 0;
            $lastYears['views'][]    = $viewsCount ? $viewsCount->count : 0;

            $start->addYear();
            $end->addYear();
        }

        return $lastYears;
    }
}