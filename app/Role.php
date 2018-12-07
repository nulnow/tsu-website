<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель роли
 */
class Role extends Model
{
    /**
     * Привязывает роль ко пользователю связью
     * много ко многим
     */
    public function users()
    {
        return $this->belongsToMany('\App\User', 'roles_users');
    }
}
