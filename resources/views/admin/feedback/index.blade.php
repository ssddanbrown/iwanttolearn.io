@extends('admin/base')

@section('content')

    <div class="col-md-12">
        <div class="page-header clearfix">
            <h1 class="pull-left">Feedback</h1>
        </div>
    </div>

    <div class="col-md-12">


        @if(count($feedbacks) > 0)
            {!! $feedbacks->render() !!}

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Topic</th>
                    <th>Email</th>
                    <th>Added</th>
                </tr>
                </thead>
                <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td><a href="/admin/feedback/{{ $feedback->id }}">{{ $feedback->topic }}</a></td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $feedbacks->render() !!}
        @else
            <p>No feedback has been added...</p>
        @endif
    </div>


@stop

