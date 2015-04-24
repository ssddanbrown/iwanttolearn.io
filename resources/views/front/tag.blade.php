
@extends('front/base')

@section('title')
    Resources for {{ $tag->name }}
@stop

@section('description')
    Find places to learn for {{ $tag->name }}
@stop

@section('content')

    <div class="page-header">
        <div class="container">
            <h1>Learn About {{ $tag->name }}</h1>
        </div>
    </div>

    <div class="hero-section tight">
        <div class="container">

            <div class="col-md-9">
                <div class="row group-container">
                    @foreach($resourceGroups as $resourceGroup)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <i class="fa fa-{{ $resourceGroup['format']->icon }}"></i>
                                    {{ $resourceGroup['format']->plural }}
                                </div>
                                <div class="list-group">
                                    @foreach($resourceGroup['resources'] as $resource)
                                        <a class="list-group-item" target="_blank" href="{{ $resource->link }}">
                                            {{ $resource->name }}
                                            @if(!$resource->isFree())
                                                <i class="fa fa-money pull-right" data-toggle="tooltip" title="{{ $resource->getCostMessage() }}"></i>
                                            @endif
                                            <br/>
                                            <span class="small">
                                                {{ $resource->getShortLink(30) }}
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-3">
                @if(count($tag->tags) > 0)
                    <div class="panel panel-primary-light">
                        <div class="panel-heading">
                            <i class="fa fa-tags"></i> Related Topics
                        </div>
                        <div class="list-group">
                            @foreach($tag->tags as $relatedTag)
                                <a class="list-group-item" href="/t/{{ $relatedTag->slug }}">
                                    {{ $relatedTag->name }} <i class="fa fa-tag pull-right"></i>
                                    <br/>
                                    <span class="small">
                                        {{ count($relatedTag->resources) }} Resources Available
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="panel panel-primary-light">
                    <div class="panel-heading">
                        <i class="fa fa-share"></i> Share This Topic
                    </div>
                    <div class="list-group social-icons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/t/' . $tag->slug)) }}" target="_blank" class="list-group-item">
                            <i class="fa fa-facebook-square"></i> <span class="text">Share on Facebook</span>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text=Learn+About+{{ urlencode($tag->name) }}&url={{ urlencode(url('/t/' . $tag->slug)) }}" target="_blank" class="list-group-item">
                            <i class="fa fa-twitter-square"></i> <span class="text">Share on Twitter</span>
                        </a>
                        <a href="https://plus.google.com/share?url={{ urlencode(url('/t/' . $tag->slug)) }}" target="_blank" class="list-group-item">
                            <i class="fa fa-google-plus-square"></i> <span class="text">Share on Google+</span>
                        </a>
                        <a href="http://www.reddit.com/submit?url={{ urlencode(url('/t/' . $tag->slug)) }}&title=Learn+About+{{ urlencode($tag->name) }}" target="_blank" class="list-group-item">
                            <i class="fa fa-reddit-square"></i> <span class="text">Share on Reddit</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="/js/masonry.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.group-container').masonry({
                itemSelector: '.col-md-4'
            });

            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

@stop