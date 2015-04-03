@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Resources</h1>
            <div class="pull-right link-group">
                <a href="/resources/create"><i class="fa fa-plus"></i> New</a>
            </div>
        </div>
    </div>

    <div class="col-md-12">

        @if(count($resources) > 0)
            {!! $resources->render() !!}

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>link</th>
                    <th>Cost</th>
                </tr>
                </thead>
                <tbody>
                @foreach($resources as $resource)
                    <tr>
                        <td><a href="/admin/resources/{{ $resource->id }}">{{ $resource->name }}</a></td>
                        <td><a href="{{ $resource->link }}" target="_blank">{{ $resource->getShortLink()  }}</a></td>
                        <td>{{ $resource->cost }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $resources->render() !!}
        @else
            <p>No resources have been added...</p>
        @endif
    </div>


@stop

