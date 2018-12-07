@extends('layouts.tsu.tsu')

@section('content')

<div class="login-wrapper">

    <form action="/login" method="post" class="login-form">
        <h3>Вход для студентов и сотрудников</h3>

        @csrf

        <input hidden type="checkbox" name="remember" checked >

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <p class="login-form__error">{{ $errors->first('email') }}</p>
            @endif
        </div>
        
        <div>
            <label for="password">Пароль:</label>
            <input type="password" name="password" value="{{ old('password') }}">
            @if($errors->has('password'))
                <p class="login-form__error">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <input type="submit" value="Войти">
    </form>

</div>
@endsection
