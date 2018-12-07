<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="nav @auth nav--social @endauth shadow">

        <div class="nav__top nav__top--social">
            <div class="container container--800">
                <h1 class="nav__title"><a href="/">@yield('navTitle', 'Кафедра информатики и вычислительной техники ТулГУ')</a></h1>
                @auth
                    <form class="logout-form" action="/logout" method="POST">
                        @csrf
                        <input class="logout-button" type="submit" value="🚪 Выйти">
                    </form>
                @endauth
                @guest
                    <a class="logout-button" href="/login">Вход для студентов и сотрудников</a>
                @endguest
            </div>
        </div>

        <div class="container">
            <div class="nav__bot">
                <a class="nav__link nav__link--social" href="/users">😁 Пользователи</a>
                <a class="nav__link nav__link--social" href="/posts">📰 Объявления</a>
                <a class="nav__link nav__link--social" target="_blank" href="http://schedule.tsu.tula.ru/">🏫 Расписание</a>
                <a class="nav__link nav__link--social" href="/me">📃 Моя страница</a>
            </div>
        </div>

    </nav>

    @yield('content')

    @auth
     <a class="toTheSotial" href="/">
        <span class="door">🚪</span>
        <span class="text">В публичную часть</span>
    </a>
    @endauth

    @if(Auth::user()->hasRole('admin'))
     <a class="toTheAdmin" href="/admin">
        <span class="admin">💂</span>
        <span class="text">В админ панель</span>
    </a>
    @endif

    <script src="/js/app.js"></script>
</body>
</html>