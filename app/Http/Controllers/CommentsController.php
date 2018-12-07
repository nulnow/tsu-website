<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Контроллер для комментариев
 */
class CommentsController extends Controller
{
    /**
     * Создает комментарий
     */
    public function store(\App\Post $post, Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comment = new \App\Comment();
        $comment->body = $request->input('comment');
        $comment->post_id = $post->id;
        $comment->user_id = $request->user()->id;
        $comment->save();

        return back();
    }

    public function destroy(\App\Post $post, \App\Comment $comment, Request $request)
    {
        if ($comment->user_id === $request->user()->id) {
            $comment->delete ();
        }

        return back();
    }
}
