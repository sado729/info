<?php
/**
 * Created by PhpStorm.
 * User: TexnoBaku
 * Date: 1/24/2019
 * Time: 11:39 PM
 */

namespace App\Models\Concerns;


trait HasTimeago
{
    /**
     * Show time ago.
     *
     * @return \Illuminate\Contracts\Translation\Translator|string
     */
    public function getTimeagoAttribute()
    {
        return timeago($this->created_at);
    }
}