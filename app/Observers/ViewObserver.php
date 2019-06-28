<?php

namespace App\Observers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ViewObserver
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
        $model->setAttribute('created_at', Carbon::now());
    }
}