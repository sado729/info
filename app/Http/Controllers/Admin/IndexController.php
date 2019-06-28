<?php

namespace App\Http\Controllers\Admin;

use App\Extensions\Date;
use App\Http\Controllers\Admin\Concerns\Statistician;
use App\Http\Controllers\Controller;
use App\Models\Visitor;

class IndexController extends Controller
{
    use Statistician;

    protected function index()
    {
        $now = Date::now();
        $weekStart = Date::today()->subDay(date('N') - 1);
        $monthStart = Date::today()->subDay(date('d') - 1);
        $yearStart = Date::today()->subDay(date('z'));

        $stats = [
            'tenDays' => $lastTenDays = static::getLastDays(10),
            'online' => Visitor::online(),
            'visitors' => [
                'today' => number_format($lastTenDays['visitors'][9]),
                'yesterday' => number_format($lastTenDays['visitors'][8]),
                'thisWeek' => number_format(Visitor::get($weekStart, $now)),
                'thisMonth' => number_format(Visitor::get($monthStart, $now)),
                'thisYear' => number_format(Visitor::get($yearStart, $now)),
                'total' => number_format(Visitor::count()),
            ]
        ];

        return view('admin.index', $stats);
    }
}
