@extends('layouts.tsu.social')

@section('title', $post->title)

@section('navTitle', 'ВТулГУ')

@section('content')

    <div class="container container--800">

        <div class="user-wall mt10">

            <article class="record">
                
                <div class="record__left-col">
                    <img class="record__author-img" src="https://via.placeholder.com/500" alt="">
                    <h4 class="record__author-name">{{ $post->user->name }}</h4>
                    @foreach($post->user->roles as $role)
                        <p class="record__author-name">{{ $role->name }}</p>
                    @endforeach

                    @if ($post->user->id === $user->id)
                        <form method="POST">
                            @csrf
                            @method('delete')

                            <button class="button button--danger" type="submit">Удалить пост</button>

                        </form>
                    @endif

                </div>

                <div class="record__right-col">
                    <h1 class="record__title">{{ $post->title }}</h1>
                    <p class="record__body">{{ $post->body }}</p>
                </div>

            </article>


            <form class="form" action="/posts/{{ $post->id }}/comments" method="POST">
                @csrf
                <label class="form__title" for="comment">Напишите комментарий</label>
                <input class="form__text-input" name="comment" id="comment">
                @if($errors->has('comment'))
                    <p class="create-post-form__error">{{ $errors->first('comment') }}</p>
                @endif
                <input class="button" type="submit" value="Отправить комментарий">
            </form>

            <h2 class="material">Комментарии:</h2>
            @foreach($post->comments as $comment)
                <article class="record record--small">
                
                    <div class="record__left-col">
                        <img class="record__author-img" src="https://via.placeholder.com/500" alt="">
                        <h4 class="record__author-name">{{ $post->user->name }}</h4>
                        @foreach($post->user->roles as $role)
                            <p class="record__author-name">{{ $role->name }}</p>
                        @endforeach

                        @if ($comment->user->id === $user->id)
                            <form action="/posts/{{$post->id}}/comments/{{$comment->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="button button--danger" type="submit">Удалить комментарий</button>
                            </form>
                        @endif
                    </div>

                    <div class="record__right-col">
                        <p class="record__body">{{ $comment->body }}</p>
                    </div>

                </article>
            @endforeach
        </div>
    </div>

@endsection