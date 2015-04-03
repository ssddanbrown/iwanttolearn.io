@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Tags</h1>
            <div class="pull-right link-group">
                <a href="/tags/create"><i class="fa fa-plus"></i> New</a>
            </div>
        </div>
    </div>

    <div class="col-md-12">

        @if(count($tags) > 0)
            {!! $tags->render() !!}

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td><a href="/admin/tags/{{ $tag->id }}">{{ $tag->name }}</a></td>
                        <td>{{ $tag->slug }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $tags->render() !!}
        @else
            <p>No tags have been added...</p>
        @endif
    </div>


@stop

