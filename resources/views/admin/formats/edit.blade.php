@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Edit format</h1>
        </div>
    </div>

    <div class="col-md-8">
        {!! Form::model($format, ['url' => '/admin/formats/update/' . $format->id, 'method' => 'put', 'class' => 'form']) !!}

            <div class="panel panel-default">
                <div class="panel-heading">Format Details</div>
                <div class="panel-body">
                    @include('admin/formats/form')
                </div>
            </div>

        {!! Form::close() !!}
    </div>

    <div class="col-md-4">
        {!! Form::model($format, ['url' => '/admin/formats/destroy/' . $format->id, 'method' => 'delete']) !!}
            <div class="panel panel-danger">
                <div class="panel-heading">Delete Format</div>
                <div class="panel-body">
                    <p><strong>This will delete this format and all links to it.</strong></p>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>


@stop

