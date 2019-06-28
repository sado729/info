<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sortable;
use Carbon\Carbon;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes, HasSlug, Translatable, Sortable;

    public $timestamps = true;
    protected $with = ['image','translations'];
    protected $translatedAttributes = ['slug', 'name', 'text'];
    protected $fillable = ['view_count', 'status','created_at','type','ordering'];

    public function image()
    {
        return $this->morphMany(Gallery::class, 'imageable');
    }

    public static function getLast($n)
    {
        return static::take($n)->latest()->get();
    }

    public static function list()
    {
        return static::latest()->paginate(10);
    }

    public static function listActive()
    {
        return static::where('active', 1);
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes[static::CREATED_AT] = Carbon::parse($value)->toDateTimeString();
    }
}
