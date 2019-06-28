<?php

namespace App\Models\Concerns;

use App\Models\Permission;

trait HasPermissions
{
    /**
     * A model may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}