<?php

namespace App\Models;

use App\Extensions\Date;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    /**
     * Get the creation date.
     *
     * @param string $value
     *
     * @return \App\Extensions\Date
     */
    public function getCreatedAtAttribute($value)
    {
        return Date::parse($value);
    }

    /**
     * Get the update date.
     *
     * @param string $value
     *
     * @return \App\Extensions\Date
     */
    public function getUpdatedAtAttribute($value)
    {
        return Date::parse($value);
    }

    /**
     * Get the expired date.
     *
     * @param string $value
     *
     * @return \App\Extensions\Date
     */
    public function getExpiredAtAttribute($value)
    {
        return Date::parse($value);
    }
}