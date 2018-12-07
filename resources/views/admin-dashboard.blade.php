@extends('layouts.tsu.social')

@section('title', 'Панель администратора')

@section('content')
    <div class="container bgcwhite">
        <h1>Панель администратора</h1>
        <div class="row e">
            <div class="col4 maxheigh600">
                <h1>Пользователи</h1>
                <form action="{{ url('users') }}" method="POST" style="padding: 5px;">
                    <h2>Создать пользователя:</h2>
                        @csrf
                        <label for="username">Имя пользователя:</label><br>
                        <input type="text" name="username" id="username" required><br>

                        <label for="email">Email пользователя:</label><br>
                        <input type="email" name="email" id="email" required><br>

                        <label for="password">Пароль</label><br>
                        <input type="password" name="password" id="password" required><br>

                        <button>Создать</button>
                </form>
                <h2>Все пользователи:</h2>
                @foreach ($users as $user)
                    <div style="text-decoration: underline; padding: 10px;">
                        <p>
                            <a href="{{ url('users', ['id' => $user->id]) }}">{{ $user->name }}</a>
                        </p>
                        <form action="{{ url('users', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button>Удалить пользователя</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="col4 maxheigh600">
                <h1>Новости</h1>
                <form action="{{ url('news') }}" method="POST" style="padding: 5px;">
                    <h2>Добавить новость:</h2>
                        @csrf
                        <label for="title">Заголовок:</label><br>
                        <input type="text" name="title" id="title" required><br>

                        <label for="body">Текст новости:</label><br>
                        <textarea name="body" id="body" cols="20" rows="10" required></textarea><br>

                        <button>Создать</button>
                </form>
                @foreach ($news as $new)
                    <p style="text-decoration: underline; padding: 10px;">
                        <a href="{{ url('news') }}">{{ $new->title }}</a>
                    </p>
                @endforeach
            </div>
            <div class="col4 maxheigh600">
                <h1>Объявления</h1>
                @foreach ($posts as $post)
                    <div style="text-decoration: underline; padding: 10px;">
                        <p>
                            <a href="{{ url('posts', ['id' => $post->id]) }}">{{ $post->title }}</a>
                        </p>
                        <form action="{{ url('posts', ['id' => $post->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button>Удалить пост</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="col4 maxheigh600">
                <h1>Мемы</h1>
            {{--                 <h1>Пользователи</h1>
                @foreach ($users as $user)
                    <p>{{ $user->name }}</p>
                @endforeach --}}

            </div>
        </div>
    </div>
@endsection