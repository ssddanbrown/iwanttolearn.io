@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Add new article</h1>
        </div>
    </div>

    <div class="col-md-12">
        {!! Form::open(['url' => '/admin/articles/store', 'class' => 'form']) !!}

            <div class="panel panel-default">
                <div class="panel-heading">Article Details</div>
                <div class="panel-body">
                    @include('admin/articles/form')
                </div>
            </div>

        {!! Form::close() !!}
    </div>


@stop

