@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Formats</h1>
            <div class="pull-right link-group">
                <a href="/formats/create"><i class="fa fa-plus"></i> New</a>
            </div>
        </div>
    </div>

    <div class="col-md-12">

        @if(count($formats) > 0)
            {!! $formats->render() !!}

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Plural Name</th>
                    <th>Icon</th>
                    <th>Order</th>
                </tr>
                </thead>
                <tbody>
                @foreach($formats as $format)
                    <tr>
                        <td><a href="/admin/formats/{{ $format->id }}">{{ $format->name }}</a></td>
                        <td>{{ $format->plural }}</td>
                        <td>{!! $format->getIconCode() !!}</td>
                        <td>{{ $format->order }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $formats->render() !!}
        @else
            <p>No formats have been added...</p>
        @endif
    </div>


@stop

