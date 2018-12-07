@extends('layouts.tsu.social')

@section('title', $post->title)

@section('navTitle', 'ВТулГУ')

@section('content')

    <div class="container container--800">

        <div class="user-wall bgcwhite mt10 shadow">

            <article class="post">
                
                <div class="post__left">
                    <img src="https://via.placeholder.com/500" alt="">
                    <h4 class="post__author-name">{{ $post->user->name }}</h4>
                    @foreach($post->user->roles as $role)
                        <p class="role role--{{$role->name}}">{{ $role->name }}</p>
                    @endforeach

                    @if ($post->user->id === $user->id)
                        <form method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit">Удалить пост</button>

                        </form>
                    @endif

                </div>

                <div class="post__right">
                    <h1>{{ $post->title }}</h1>
                    <p>{{ $post->body }}</p>
                </div>

            </article>
        </div>

        <form class="create-post-form bgcwhite mt10 shadow" action="/posts/{{ $post->id }}/comments" method="POST">
            @csrf

            <div>
                <label for="comment">Напишите комментарий</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                @if($errors->has('comment'))
                    <p class="create-post-form__error">{{ $errors->first('comment') }}</p>
                @endif
            </div>

            <input type="submit" value="Отправить комментарий">
        </form>

        <div class="user-wall bgcwhite mt10 shadow">
            <h2>Комментарии:</h2>
            @foreach($post->comments as $comment)
                <article class="post">
                
                    <div class="post__left">
                        <img src="https://via.placeholder.com/500" alt="">
                        <h4 class="post__author-name">{{ $comment->user->name }}</h4>
                        @foreach($comment->user->roles as $role)
                            <p class="role role--{{$role->name}}">{{ $role->name }}</p>
                        @endforeach

                        @if ($comment->user->id === $user->id)
                            <form action="/posts/{{$post->id}}/comments/{{$comment->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить комментарий</button>
                            </form>
                        @endif
                    </div>

                    <div class="post__right">
                        <p>{{ $comment->body }}</p>
                    </div>

                </article>
            @endforeach
        </div>
    </div>

@endsection