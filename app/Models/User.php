<?php

namespace App\Models;

use App\Models\Concerns\HasRoles;
use App\Models\Concerns\Sluggable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable as AuthorizableTrait;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract , Authorizable
{
    use Sluggable,
        Authenticatable,
        AuthorizableTrait,
        CanResetPassword,
        HasRoles,
        SoftDeletes,
        Notifiable;

    protected $fillable = ['name','slug', 'email', 'password','status'];
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public static function getByEmail($email)
    {
        return static::where('email', $email)->first();
    }
}
