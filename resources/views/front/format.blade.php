
@extends('front/base')

@section('title')
    {{ $format->name }} Resources
@stop

@section('description')
    Here is a range of {{ $format->name }} resources for various topics relevant for development.
@stop

@section('body-class', 'white')

@section('content')

    <div class="page-header">
        <div class="container">
            <h1>Resources In {{ $format->name }} Format</h1>
        </div>
    </div>


    <div class="hero-section tight">
        <div class="container">
            <h4><span class="text-primary">{!! $format->getIconCode() !!}</span>&nbsp;&nbsp;&nbsp; {{ count($format->resources) }} Resources Available</h4>
            <br/><br/>

            @if(count($format->resources) === 0)
                <p>Sorry, No resources are available in this format.</p>
            @endif

            @foreach(array_chunk($format->resources->all(), 3) as $resources)
                <div class="row">
                @foreach($resources as $resource)
                    <div class="col-md-4 col-sm-6">
                        <div class="resource-item">
                            <a href="{{ $resource->link }}" target="_blank">
                                <h4>{{ $resource->name }}</h4>
                                <p>{{ $resource->getShortLink(40) }}</p>
                            </a>
                            <div class="tags">
                                @foreach($resource->tags as $tag)
                                    <a class="resource-item-tag-link" href="{{ $tag->link() }}">
                                        <i class="fa fa-tag"></i><span>{{ $tag->name }}</span>
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endforeach
                </div>
            @endforeach


        </div>
    </div>


@stop