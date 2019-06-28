<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;

class NewsTranslation extends Model
{
    use Sluggable;

    public $fillable = ['slug', 'name', 'text'];
    public $timestamps = false;
}