<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Контролеер для администратора
 */
class AdminController extends Controller
{
    /**
     * Выводит панель администратора
     */
    public function dashboard(Request $request)
    {
        $users = \App\User::all();
        $posts = \App\Post::all();
        $news = \App\NewsRecord::all();

        return view('admin-dashboard')
            ->withUsers($users)
            ->withPosts($posts)
            ->withNews($news);
    }
}
