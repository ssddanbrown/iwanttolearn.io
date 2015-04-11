@extends('admin/base')

@section('content')

    <div class="page-header">
        <h1>Admin Dashboard</h1>
        <h4>Welcome {{ Auth::user()->name }}</h4>
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">Create a new...</div>
                <div class="list-group">
                    <a class="list-group-item" href="/admin/resources/create">
                        <i class="fa fa-book"></i> Resource
                    </a>
                    <a class="list-group-item" href="/admin/articles/create">
                        <i class="fa fa-newspaper-o"></i> Article
                    </a>
                    <a class="list-group-item" href="/admin/tags/create">
                        <i class="fa fa-tags"></i> Tag
                    </a>
                    <a class="list-group-item" href="/admin/formats/create">
                        <i class="fa fa-file-text"></i> Format
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">Notifications</div>
                <div class="list-group">
                    <div class="list-group-item">
                        <i class="fa fa-retweet"></i>
                        <a href="/admin/feedback">{{ $feedbackCount }} feedback submissions pending</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop