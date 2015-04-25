
@extends('front/base')

@section('title', '404 // Page not found')

@section('content')

    <div class="hero-home hero-section blue">
        <div class="container">
            <h1>Page Not Found</h1>
            <p style="font-size: 1.666em;">I'm sorry, we couldn't find the page you were looking for, <br/>
            Below are some links you might find useful...</p>
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
            @include('front/parts/recent-resources')
        </div>
    </div>

@stop