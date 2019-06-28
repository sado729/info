<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Authorize all actions for the developer.
     *
     * @param \App\Models\User $user
     *
     * @return bool|null
     */
    public function before(User $user)
    {
        return $user->admin ?: null;
    }

    /**
     * Determine whether the user can manage accounts.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function manage(User $user)
    {
        return $user->hasPermission('manage_settings');
    }
}
