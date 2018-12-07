@extends('layouts.tsu.tsu')

@section('content')
    <div class="container page sup-typo news bgcwhite mt10 shadow container--800">
        <h1>Новости 📰</h1>
        @foreach($news as $article)
            <article>
                <h1>{{ $article->title }}</h1>
                <p>{{ $article->body }}</p>
            </article>
        @endforeach
    </div>
@endsection