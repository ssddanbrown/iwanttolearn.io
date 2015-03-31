@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Users</h1>
            <div class="pull-right link-group">
                <a href="users/create"><i class="fa fa-plus"></i> New</a>
            </div>
        </div>
    </div>

    <div class="col-md-12">

        @if(count($users) > 0)
            {!! $users->render() !!}

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $users->render() !!}
        @else
            <p>No users have been added...</p>
        @endif
    </div>


@stop

