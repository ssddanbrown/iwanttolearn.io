
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
                @foreach($tags as $tag)
                    <a class="tag-link" href="/t/{{ $tag->slug }}">
                        <i class="fa fa-tag"></i>
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="hero-section white">
        <div class="container">
            <h2>Recently Added Resources</h2>
            <div class="row">
                @foreach($recentResources as $resource)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ $resource->link }}" target="_blank" class="resource-item">
                            <h4>{{ $resource->name }}</h4>
                            <p>{{ $resource->getShortLink(40) }}</p>
                            <div class="tags">
                                <i class="fa fa-tags"></i>
                                @foreach($resource->tags as $tag)
                                    <span>{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@stop