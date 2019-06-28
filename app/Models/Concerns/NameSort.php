<?php

namespace App\Models\Concerns;

use App\Scopes\NameSortScope;

trait NameSort
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function bootNameSort()
    {
        static::addGlobalScope(new NameSortScope);
    }
}
