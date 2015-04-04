
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

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

@stop