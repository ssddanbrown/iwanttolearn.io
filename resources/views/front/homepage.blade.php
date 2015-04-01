
@extends('front/base')

@section('content')

    <div class="hero-home">
        <div class="container">
            <h1>Find new places to learn</h1>
        </div>
    </div>

    <div class="container">
        <h2>Available Topics</h2>
        <div>
            @foreach($tags as $tag)
                <a class="tag-link" href="/t/{{ $tag->slug }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>

@stop