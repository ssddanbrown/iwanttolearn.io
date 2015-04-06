@extends('admin/base')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="page-header clearfix">
                <h1 class="pull-left">Feedback</h1>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Feedback Details
                </div>
                <div class="panel-body">
                    <h4>From:</h4>
                    <p><a href="mailto:{{ $feedback->email }}">{{ $feedback->email }}</a></p>
                    <h4>Topic:</h4>
                    <p>{{ $feedback->topic }}</p>
                    <h4>Message:</h4>
                    <p>{!! nl2br($feedback->message) !!}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            {!! Form::model($feedback, ['url' => '/admin/feedback/destroy/' . $feedback->id, 'method' => 'delete']) !!}
            <div class="panel panel-danger">
                <div class="panel-heading">Delete Resource</div>
                <div class="panel-body">
                    <p><strong>This will delete this feedback.</strong></p>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>



@stop

