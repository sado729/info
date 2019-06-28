<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class SortingObserver
{
    /**
     * Listen to the model creating event.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    public function creating(Model $model)
    {
        $model->setAttribute('order', $model->lastOrder() + 1);
    }
}