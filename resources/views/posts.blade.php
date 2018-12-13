@extends('layouts.tsu.social')

@section('title', 'Объявления')

@section('content')
    <div class="container container--800">
        <div class="user-wall  mt10">
            <form class="form" action="/posts" method="POST">
                @csrf

                <label for="post-title">Введите заголовок поста</label>
                <input class="form__text-input" type="text" name="post-title" id="post-title">
                @if($errors->has('post-title'))
                    <p class="create-post-form__error">{{ $errors->first('post-title') }}</p>
                @endif
            
                <label for="post-body">Напишите пост</label>
                <textarea  class="form__text-input" name="post-body" id="post-body" cols="30" rows="4"></textarea>
                @if($errors->has('post-body'))
                    <p class="create-post-form__error">{{ $errors->first('post-body') }}</p>
                @endif

                <input class="button" type="submit" value="Создать пост">
            </form>
            <h2 class="material">Записи:</h2>
            @foreach($posts as $post)

                <article class="record">
                    <div class="record__left-col">
                        <img class="record__author-img" src="https://via.placeholder.com/500" alt="">
                        <h4 class="record__author-name">{{ $post->user->name }}</h4>
                        @foreach($post->user->roles as $role)
                            <p class="record__author-name">{{ $role->name }}</p>
                        @endforeach

                    </div>

                    <div class="record__right-col">
                        <h1 class="record__title"><a class="post__link" href="/posts/{{ $post->id }}">{{ $post->title }}</a></h1>
                        <p class="record__body">{{ $post->short() }}</p>
                    </div>

                </article>
            @endforeach
        </div>
    </div>
@endsection