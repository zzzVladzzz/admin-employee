<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable, HasRoles;

    CONST ADMINISTRATOR = 1;
    CONST MANAGER = 2;

    public static $role;

    /**
     * @param null $role
     * @return array|mixed|null
     */
    public static function getRoleName(int $role = null)
    {
        $roles =[
            self::ADMINISTRATOR => 'Administrator',
            self::MANAGER => 'Manager',
        ];

        if(!empty($role)){
            return isset($roles[$role]) ? $roles[$role] : null;
        }

        return $roles;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
