@extends('layouts.tsu.social')

@section('title', 'Пользователи')

@section('content')

    <div class="container container--800 mt10 shadow bgcwhite">
        <h1 style="padding: 20px">Пользователи</h1>
        @foreach($users as $user)
            <div style="padding: 20px">
                <h2><a href="/users/{{$user->id}}">{{ $user->name }}</a></h2>
            </div>
        @endforeach
    </div>

@endsection