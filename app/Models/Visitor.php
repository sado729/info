<?php

namespace App\Models;

use App\Extensions\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visitor extends Model
{
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
    protected $fillable = [
        'session',
        'platform',
        'browser',
        'version',
        'ip',
        'created_at',
    ];

    /**
     * Get online visitors count.
     *
     * @return int
     */
    public static function online()
    {
        return static::where('visited_at', '>', Date::now()->subMinutes(3))->count();
    }

    /**
     * Get visitors count.
     *
     * @param string               $fn
     * @param \App\Extensions\Date $start
     * @param \App\Extensions\Date $end
     *
     * @return mixed
     */
    public static function stat($fn, Date $start, Date $end)
    {
        return static::select([DB::raw($fn.'(`visited_at`) AS `date`'), DB::raw('count(`id`) AS `count`')])
                     ->whereBetween('visited_at', [$start, $end])
                     ->groupBy('date')
                     ->latest('date')
                     ->get();
    }

    /**
     * Get visitors count.
     *
     * @param \App\Extensions\Date $start
     * @param \App\Extensions\Date $end
     *
     * @return int
     */
    public static function get(Date $start, Date $end)
    {
        return static::whereBetween('visited_at', [$start, $end])->count();
    }
}
