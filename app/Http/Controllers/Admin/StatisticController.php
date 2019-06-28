<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\BankStatistician;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    use BankStatistician;

    protected function show($id,Request $request)
    {
        abort_unless(Auth::user()->can('manage', Bank::class), 404);

        if($request->bank_id){ $id = $request->bank_id; }
        if ($request->end){
            $date = Carbon::parse($request->end);
            $lastTenDays = static::getSpecificDays($id,$request->start,$request->end);
        }else{
            $date = Carbon::now();
            $lastTenDays = static::getLastDays($id, 30);
        }
        $weekStart  = $date->subDay(date('N') - 1);
        $monthStart = $date->subDay(date('d') - 1);
        $yearStart  = $date->subDay(date('z'));
        $oldyear  = $date->subYears(10);

        $orders = $lastTenDays['orders'];
        $accepted = $lastTenDays['accepted'];
        $rejected = $lastTenDays['rejected'];
        $thisWeek = Bank::getWithStats($id, $weekStart, $date);
        $thisMonth = Bank::getWithStats($id, $monthStart, $date);
        $thisYear = Bank::getWithStats($id, $yearStart, $date);
        $total = Bank::getWithStats($id, $oldyear, $date);

        $stats = [
            'tenDays' => $lastTenDays,
            'orders' => [
                'today' => count($orders) ? number_format($orders[count($orders)-1]) : 0,
                'yesterday' => count($orders) ? number_format($orders[count($orders)-2]) : 0,
                'thisWeek' => number_format($thisWeek['orders_count']),
                'thisMonth' => number_format($thisMonth['orders_count']),
                'thisYear' => number_format($thisYear['orders_count']),
                'total' => number_format($total['orders_count']),
            ],
            'accepted' => [
                'today' => count($accepted) ? number_format($accepted[count($accepted)-1]) : 0,
                'yesterday' => count($accepted) ? number_format($accepted[count($accepted)-2]) : 0,
                'thisWeek' => number_format($thisWeek['accepted_orders_count']),
                'thisMonth' => number_format($thisMonth['accepted_orders_count']),
                'thisYear' => number_format($thisYear['accepted_orders_count']),
                'total' => number_format($total['accepted_orders_count']),
            ],
            'rejected' => [
                'today' => count($rejected) ? number_format($rejected[count($rejected)-1]) : 0,
                'yesterday' => count($rejected) ? number_format($rejected[count($rejected)-2]) : 0,
                'thisWeek' => number_format($thisWeek['rejected_orders_count']),
                'thisMonth' => number_format($thisMonth['rejected_orders_count']),
                'thisYear' => number_format($thisYear['rejected_orders_count']),
                'total' => number_format($total['rejected_orders_count']),
            ],
        ];


        $banks = Bank::activelist();
        $start = $request->start;
        $end = $request->end;
        $bank = Bank::find($id);

        return view('admin.statistic',compact('banks','start','end','bank') + $stats);
    }
}
