
@extends('front/base')

@section('content')

    <div class="page-header">
        <div class="container">
            <h1>{{ $tag->name }}</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
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
                                {{ $resource->name }} <br/>
                                <span class="small">{{ $resource->getShortLink(30) }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

@stop