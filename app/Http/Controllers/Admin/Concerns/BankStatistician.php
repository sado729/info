<?php

namespace App\Http\Controllers\Admin\Concerns;

use App\Models\Bank;
use Carbon\Carbon;

trait BankStatistician
{
    /**
     * Get statistics for the specific days.
     *
     * @param int $n
     *
     * @return array
     */
    private static function getSpecificDays($id,$start,$end)
    {
        $lastDays = [
            'days'          => [],
            'orders'        => [],
            'accepted'      => [],
            'rejected'      => [],
        ];

        $start = Carbon::parse($start);
        $end   = Carbon::parse($end);

        $n = Carbon::parse($start)->DiffInDays($end);

        for ($i = $n; $i > 0; $i--) {
            $banks = Bank::getWithStats($id,$start,$end);
            $ordersCount      = $banks['orders_count'];
            $acceptedCount    = $banks['accepted_orders_count'];
            $rejectedCount    = $banks['rejected_orders_count'];

            $lastDays['days'][]     = $start->format('d');
            $lastDays['orders'][]   = $ordersCount ?: 0;
            $lastDays['accepted'][] = $acceptedCount ?: 0;
            $lastDays['rejected'][] = $rejectedCount ?: 0;

            $start->addDay();
            $end->addDay();
        }

        return $lastDays;
    }

    /**
     * Get statistics for the last n days.
     *
     * @param int $n
     *
     * @return array
     */
    private static function getLastDays($id,$n)
    {
        $lastDays = [
            'days'          => [],
            'orders'        => [],
            'accepted'      => [],
            'rejected'      => [],
        ];

        $start = Carbon::now()->subDay($n);
        $end   = Carbon::now()->subDay($n)->addDay();

        for ($i = $n; $i > 0; $i--) {
            $banks = Bank::getWithStats($id,$start,$end);
            $ordersCount      = $banks['orders_count'];
            $acceptedCount    = $banks['accepted_orders_count'];
            $rejectedCount    = $banks['rejected_orders_count'];

            $lastDays['days'][]     = $start->format('d');
            $lastDays['orders'][]   = $ordersCount ?: 0;
            $lastDays['accepted'][] = $acceptedCount ?: 0;
            $lastDays['rejected'][] = $rejectedCount ?: 0;

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
    private static function getLastMonths($id,$n)
    {
        $lastMonths = [
            'days'          => [],
            'orders'        => [],
            'accepted'      => [],
            'rejected'      => [],
        ];

        $days = date('d') - 1;

        $end   = Carbon::now()->subDay($days)->addMonth();
        $start = Carbon::now()->subDay($days)->subMonth($n - 1);

        for ($i = $n; $i > 0; $i--) {
            $banks = Bank::getWithStats($id,$start,$end);
            $ordersCount      = $banks['orders_count'];
            $acceptedCount    = $banks['accepted_orders_count'];
            $rejectedCount    = $banks['rejected_orders_count'];

            $lastMonths['months'][]   = __('datetime.'.$start->format('M'));
            $lastMonths['orders'][]   = $ordersCount ?: 0;
            $lastMonths['accepted'][] = $acceptedCount ?: 0;
            $lastMonths['rejected'][] = $rejectedCount ?: 0;

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

        $end   = Carbon::now()->subDay($days)->addYear();
        $start = Carbon::now()->subDay($days)->subYear($n - 1);

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