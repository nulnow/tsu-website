<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Выводит конкретный пост
     */
    public function post(\App\Post $post, Request $request)
    {
        return view('post')->withPost($post)->withUser($request->user());
    }

    /**
     * Выводит список всех постов
     */
    public function posts(Request $requset)
    {
        return view('posts')->withPosts(\App\Post::orderBy('created_at', 'DESC')->get());
    }

    /**
     * Создаёт пост
     */
    public function store(Request $request)
    {
        // Проверка корректности пришедших данных
        $request->validate([
            'post-title' => 'required',
            'post-body' => 'required'
        ]);

        $postTitle = $request->input('post-title');
        $postBody = $request->input('post-body');

        $post = new \App\Post();
        $post->title = $postTitle;
        $post->body = $postBody;
        $post->user_id = $request->user()->id;
        $post->save();

        return redirect()->back();
    }

    /**
     * Удаляет пост
     */
    public function destroy(\App\Post $post, Request $request)
    {
        // Удалить может только создатель поста
        if (
                $post->user_id === $request->user()->id
            or
                $request->user()->hasRole('admin')
            ) {

            // Удаление всех комментариев поста
            foreach($post->comments as $comment) {
                $comment->delete ();
            }

            $post->delete ();
        }

        if ($request->user()->hasRole('admin')) {
            return redirect()->route('admin-dashboard');
        }

        return redirect()->route('posts');;
    }
}