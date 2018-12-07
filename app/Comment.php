<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для комментариев к постам
 */
class Comment extends Model
{
    /**
     * Привязывает комментарий к пользователю
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    /**
     * Привязывает комментарий к посту
     */
    public function post()
    {
        return $this->belongsTo('\App\Post');
    }
}
