@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Edit tag</h1>
        </div>
    </div>

    <div class="col-md-8">
        {!! Form::model($tag, ['url' => '/admin/tags/update/' . $tag->id, 'method' => 'put', 'class' => 'form']) !!}

            <div class="panel panel-default">
                <div class="panel-heading">Tag Details</div>
                <div class="panel-body">
                    @include('admin/tags/form')
                </div>
            </div>

        {!! Form::close() !!}
    </div>

    <div class="col-md-4">
        {!! Form::model($tag, ['url' => '/admin/tags/destroy/' . $tag->id, 'method' => 'delete']) !!}
            <div class="panel panel-danger">
                <div class="panel-heading">Delete Tag</div>
                <div class="panel-body">
                    <p><strong>This will delete this tag and all links to it.</strong></p>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>


@stop

