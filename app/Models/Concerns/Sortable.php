<?php

namespace App\Models\Concerns;

use App\Observers\SortingObserver;
use App\Scopes\SortingScope;

trait Sortable
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function bootSortable()
    {
        static::observe(new SortingObserver);
        static::addGlobalScope(new SortingScope);
    }

    /**
     * Sort the models.
     *
     * @param int $order
     *
     * @return bool
     */
    public function sort($order)
    {
        $this->fillable[] = 'order';

        return $this->update(compact('order'));
    }

    /**
     * Get the last order.
     *
     * @return int
     */
    public function lastOrder()
    {
        return static::max('order');
    }
}
