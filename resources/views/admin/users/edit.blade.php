@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Edit User</h1>
        </div>
    </div>

    <div class="col-md-8">
        {!! Form::model($user, ['url' => '/admin/users/update/' . $user->id, 'method' => 'put', 'class' => 'form']) !!}

            <div class="panel panel-default">
                <div class="panel-heading">User Details</div>
                <div class="panel-body">
                    @include('admin/users/form', ['currentTags' => $user->tags, 'currentFormats' => $user->formats])
                </div>
            </div>

        {!! Form::close() !!}
    </div>

    <div class="col-md-4">
        {!! Form::model($user, ['url' => '/admin/users/destroy/' . $user->id, 'method' => 'delete']) !!}
            <div class="panel panel-danger">
                <div class="panel-heading">Delete User</div>
                <div class="panel-body">
                    <p><strong>This will delete this user and all links to it.</strong></p>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>


@stop

