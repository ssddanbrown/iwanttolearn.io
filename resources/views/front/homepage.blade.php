
@extends('front/base')

@section('content')

    <div class="container">
        <h1>Welcome ...</h1>
    </div>

    <div class="container">
        <h2>Tags:</h2>
        <div>
            @foreach($tags as $tag)
                <a href="/t/{{ $tag->slug }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>

@stop