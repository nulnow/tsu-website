<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Контроллер для новостей
 */
class NewsController extends Controller
{

    /**
     * Выводит список всех новостей
     */
    public function index(Request $request)
    {
        $news = \App\NewsRecord::orderBy('created_at', 'DESC')->get();
        return view('news')->withNews($news);
    }

    /**
     * Создает новость
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        
       $title = $request->input('title');
       $body = $request->input('body');

       $newsArticle = new \App\NewsRecord();
       $newsArticle->title = $title;
       $newsArticle->body = $body;
       $newsArticle->save();

        return back();
    }
}