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
        
        @if ($user->id === $currentUser->id)
        <form class="create-post-form bgcwhite mt10 shadow" action="/posts" method="POST">
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
        @endif

        <div class="user-wall bgcwhite mt10 shadow">
            <h2>Записи:</h2>
            @foreach($user->posts()->orderBy('created_at', 'DESC')->get() as $post)
                <article class="post">
                
                    <div>
                        <img src="https://via.placeholder.com/500" height=70 alt="">
                        <h4 class="post__author-name">{{ $post->user->name }}</h4>
                        @foreach($post->user->roles as $role)
                            <p class="role role--{{$role->name}}">{{ $role->name }}</p>
                        @endforeach
                        @if ($post->user->id === $currentUser->id)
                            <form method="POST" action="/posts/{{$post->id}}">
                                @csrf
                                @method('delete')

                                <button type="submit">Удалить пост</button>

                            </form>
                        @endif
                    </div>

                    <div>
                        <h1>{{ $post->title }}</h1>
                        <p>{{ $post->body }}</p>
                    </div>

                </article>
            @endforeach
        </div>
    </div>

@endsection