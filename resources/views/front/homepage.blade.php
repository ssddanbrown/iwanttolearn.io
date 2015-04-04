
@extends('front/base')

@section('title', 'Find New Places To Learn')
@section('description', 'Find places to learn and grow your knowledge on a variety of subjects such as HTML, PHP, CSS and more. Learning resources are listed by media type so you can find a style of learning that suits you')

@section('content')

    <div class="hero-home hero-section blue">
        <div class="container">
            <h1>Find new places to learn</h1>
        </div>
    </div>

    <div class="hero-section">
        <div class="container">
            <h2>Available Topics</h2>
            <div>
                @include('front/parts/tag-links')
            </div>
        </div>
    </div>

    <div class="hero-section white">
        <div class="container">
            <h2>Recently Added Resources</h2>
            <div class="row">
                @include('front/parts/recent-resources')
            </div>
        </div>
    </div>


@stop