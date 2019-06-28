<?php

namespace App\Models;

class Permission extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get permission.
     *
     * @param string $permission
     *
     * @return \App\Models\Permission|null
     */
    public static function get($permission)
    {
        return static::whereName($permission)->first();
    }
}
