
@extends('front/base')

@section('content')

    <div class="container">
        <h1>Tag: {{ $tag->name }}</h1>
    </div>

    <div class="container row">
        @foreach($resourceGroups as $resourceGroup)
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-{{ $resourceGroup['format']->icon }}"></i>
                        {{ $resourceGroup['format']->name }}
                    </div>
                    <div class="list-group">
                        @foreach($resourceGroup['resources'] as $resource)
                            <a class="list-group-item" target="_blank" href="{{ $resource->link }}">
                                {{ $resource->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@stop