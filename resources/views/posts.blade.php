@extends('layouts.tsu.social')

@section('title', 'Объявления')

@section('content')
    <div class="container container--800">
        <div class="user-wall bgcwhite mt10">
            <form class="create-post-form bgcwhite mt10" action="/posts" method="POST">
                @csrf

                <div>
                    <label for="post-title">Введите заголовок поста</label>
                    <input type="text" name="post-title" id="post-title">
                    @if($errors->has('post-title'))
                        <p class="create-post-form__error">{{ $errors->first('post-title') }}</p>
                    @endif
                </div>
                
                <div>
                    <label for="post-body">Напишите пост</label>
                    <textarea name="post-body" id="post-body" cols="30" rows="10"></textarea>
                    @if($errors->has('post-body'))
                        <p class="create-post-form__error">{{ $errors->first('post-body') }}</p>
                    @endif
                </div>

                <input type="submit" value="Создать пост">
            </form>
            <h2>Записи:</h2>
            @foreach($posts as $post)
                <article class="post">
                
                    <div class="post__left">
                        <img src="https://via.placeholder.com/500" alt="">
                        <h4 class="post__author-name">{{ $post->user->name }}</h4>
                        @foreach($post->user->roles as $role)
                            <p class="role role--{{$role->name}}">{{ $role->name }}</p>
                        @endforeach
                    </div>

                    <div class="post__right">
                        <h1><a class="post__link" href="/posts/{{ $post->id }}">{{ $post->title }}</a></h1>
                        <p>{{ $post->short() }}</p>
                    </div>

                </article>
            @endforeach
        </div>
    </div>
@endsection