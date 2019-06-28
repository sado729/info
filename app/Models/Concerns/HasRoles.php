<?php

namespace App\Models\Concerns;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Cache;

trait HasRoles
{
    /**
     * A user may have multiple roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Determine if the user has the given role.
     *
     * @param mixed $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        if (is_int($role)) {
            return $this->roles->contains('id', $role);
        }

        return (bool) $role->intersect($this->roles)->count();
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param string $permission
     *
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->hasRole(Permission::get($permission)->roles);
    }

    /**
     * Determine if the user is a developer.
     *
     * @return bool
     */
    public function getIsDeveloperAttribute()
    {
        return Cache::rememberForever('user:developer:'.$this->id, function () {
            return $this->hasRole('developer');
        });
    }

    /**
     * Determine if the user is an admin.
     *
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        return Cache::rememberForever('user:admin:'.$this->id, function () {
            return $this->hasRole('admin');
        });
    }

    /**
     * Determine if the user is a freelamcer.
     *
     * @return bool
     */
    public function getIsEditorAttribute()
    {
        return Cache::rememberForever('user:editor:'.$this->id, function () {
            return $this->hasRole('editor');
        });
    }

    /**
     * Determine if the user is a freelamcer.
     *
     * @return bool
     */
    public function getIsStoreAttribute()
    {
        return Cache::rememberForever('user:store:'.$this->id, function () {
            return $this->hasRole('store');
        });
    }

    /**
     * Determine if the user is a freelamcer.
     *
     * @return bool
     */
    public function getIsUserAttribute()
    {
        return Cache::rememberForever('user:user:'.$this->id, function () {
            return $this->hasRole('user');
        });
    }

    /**
     * Get the role of the user.
     *
     * @return static|null
     */
    public function getRoleAttribute()
    {
        return $this->roles()->first();
    }

    /**
     * Determine if the user is a developer or an admin.
     *
     * @return bool
     */
    public function getAdminAttribute()
    {
        return $this->isDeveloper or $this->isAdmin;
    }

    /**
     * Determine if the user is a developer or an admin.
     *
     * @return bool
     */
    public function getAccountAttribute()
    {
        return $this->isStore or $this->isUser;
    }
}
