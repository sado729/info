<?php

namespace App\Models;

use App\Models\Concerns\HasPermissions;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Role extends EloquentModel
{
    use HasPermissions;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the users that have the role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}