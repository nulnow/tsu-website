@extends('layouts.tsu.social')

@section('title', $user->name)

@section('navTitle', 'ВТулГУ')

@section('content')

    <div class="container container--800">
        <div class="user-profile bgcwhite mt10 shadow">
            <div class="user-profile__col1">
                <img class="user-profile__user-avatar" src="https://via.placeholder.com/500" alt="user avatar">
            </div>
            <div class="user-profile__col2">
                <h1 class="user-profile__user-name">User name: {{ $user->name }}</h1>
                <p class="user-profile__user-status">User status: </p>
            </div>
        </div>

        <div class="user-wall mt10 shadow">

            @if ($user->id === $currentUser->id)
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
            @endif

            <h2 class="material">Записи:</h2>
            @foreach($user->posts()->orderBy('created_at', 'DESC')->get() as $post)
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