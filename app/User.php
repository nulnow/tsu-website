<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Модель пользователя
 */
class User extends Authenticatable
{
    use Notifiable;

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
     * Привязка постов к пользователю
     */
    public function posts()
    {
        return $this->hasMany('\App\Post');
    }

    /**
     * Привязка ролей к пользователю
     */
    public function roles()
    {
        return $this->belongsToMany('\App\Role', 'roles_users');
    }

    /**
     * Дополнительный метод, проверяющий есть ли у пользователя
     * данная роль
     */
    public function hasRole($roleName)
    {
        foreach($this->roles as $role) {
            if ($role->name == $roleName) {
                return true;
            }
        }
        return false;
    }
}
