@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Edit Article</h1>
        </div>
    </div>

    <div class="col-md-8">
        {!! Form::model($article, ['url' => '/admin/articles/update/' . $article->id, 'method' => 'put', 'class' => 'form']) !!}

            <div class="panel panel-default">
                <div class="panel-heading">Article Details</div>
                <div class="panel-body">
                    @include('admin/articles/form', ['currentTags' => $article->tags, 'currentFormats' => $article->formats])
                </div>
            </div>

        {!! Form::close() !!}
    </div>

    <div class="col-md-4">
        {!! Form::model($article, ['url' => '/admin/articles/destroy/' . $article->id, 'method' => 'delete']) !!}
            <div class="panel panel-danger">
                <div class="panel-heading">Delete Article</div>
                <div class="panel-body">
                    <p><strong>This will delete this article and all links to it.</strong></p>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>


@stop

