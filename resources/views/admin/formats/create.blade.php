@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Add new format</h1>
        </div>
    </div>

    <div class="col-md-12">
        {!! Form::open(['url' => '/admin/formats/store', 'class' => 'form']) !!}

            <div class="panel panel-default">
                <div class="panel-heading">Format Details</div>
                <div class="panel-body">
                    @include('admin/formats/form')
                </div>
            </div>

        {!! Form::close() !!}
    </div>


@stop

