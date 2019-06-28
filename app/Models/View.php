<?php

namespace App\Models;

use App\Concerns\HasObserver;
use App\Extensions\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class View extends Model
{
    use HasObserver;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_at'];

    /**
     * Get views count.
     *
     * @param string               $fn
     * @param \App\Extensions\Date $start
     * @param \App\Extensions\Date $end
     *
     * @return mixed
     */
    public static function stat($fn, Date $start, Date $end)
    {
        return static::select([DB::raw($fn.'(`created_at`) AS `date`'), DB::raw('count(`id`) AS `count`')])
                     ->whereBetween('created_at', [$start, $end])
                     ->groupBy('date')
                     ->latest('date')
                     ->get();
    }

    /**
     * Get event views count.
     *
     * @param \App\Extensions\Date $start
     * @param \App\Extensions\Date $end
     *
     * @return int
     */
    public static function get(Date $start, Date $end)
    {
        return static::whereBetween('created_at', [$start, $end])->count();
    }
}
