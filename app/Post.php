<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель поста (объявления)
 */
class Post extends Model
{
    /**
     * Ввозвращая короткий текст поста (обрезает до 240 символов полный текст)
     */
    public function short()
    {
        return substr($this->body, 0, 240);
    }

    /**
     * Привязывает пост к пользователю
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    /**
     * Привязывает комментарии к посту
     */
    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }
}
