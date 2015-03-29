@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Articles</h1>
            <div class="pull-right link-group">
                <a href="articles/create"><i class="fa fa-plus"></i> New</a>
            </div>
        </div>
    </div>

    <div class="col-md-12">

        @if(count($articles) > 0)
            {!! $articles->render() !!}

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td><a href="/admin/articles/{{ $article->id }}">{{ $article->title }}</a></td>
                        <td><a href="{{ $article->link }}" target="_blank">{{ $article->getShortLink(30)  }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $articles->render() !!}
        @else
            <p>No articles have been added...</p>
        @endif
    </div>


@stop

