<?php

namespace App\Models;

class RoleUser extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $fillable = ['user_id', 'role_id'];
    protected $table = "role_user";

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function roles()
    {
        return $this->hasMany(Role::class, 'role_id', 'id');
    }
}
