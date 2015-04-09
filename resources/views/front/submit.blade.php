
@extends('front/base')

@section('title', 'Submit A New Resource')
@section('description', 'I love learning new things and also love the fact that the internet has made a wide range of learning resources accessible in a variety of formats. I want to create a single point of access to all these fantastic resources so people can quickly find places to learn in the format that suits them.')

@section('content')


    <div class="page-header">
        <div class="container">
            <h1>Submit A Resource</h1>
        </div>
    </div>

    @include('front/parts/messages')

    <div class="hero-section tight">
        <div class="container">

            <div class="row" id="resource-form">

                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Submission Form</div>
                        <div class="panel-body">
                            {!! Form::open(['url' => '/submit/resource', 'method' => 'POST', 'class' => 'form']) !!}
                            <div class="form-group">
                                {!! Form::label('email', 'Your Email', ['class'=>'control-label required']) !!}
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('extra-link', 'Resource Link', ['class'=>'control-label required']) !!}
                                {!! Form::text('extra-link', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('extra-message', 'Extra Details', ['class'=>'control-label']) !!}
                                {!! Form::textarea('extra-message', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <label class="required">Captcha</label>
                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITEKEY') }}"></div>
                            </div>

                            <p>
                                <span class="required">&nbsp;</span> Fields are required.
                            </p>

                            @include('front/parts/errors')

                            <button class="btn btn-success btn-block">Submit</button>

                            {!! Form::close() !!}

                            <p class="text-muted">
                                <br/>
                                Your email will only be used to provide feedback, It will not be passed to any third parties.
                                <br/> Any referral data on links may be removed or replaced.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Resource Guidelines</div>
                        <div class="list-group">
                            <div class="list-group-item">
                                The link must go to something you can learn from, Not another directory of links. I don't want a user to have to follow a trail of links to get to an actual learning resource.
                            </div>
                            <div class="list-group-item">
                                Content on the resource page must be specific to a particular topic, Not a bunch of mixed topic. Users should not have to filter through a page to find relevant information
                            </div>
                            <div class="list-group-item">
                                A resource should be friendly to all age groups. Some swearing is fine but nothing adult or obscene.
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('input[name="extra-link"]').first().change(function() {
                var link = $(this).val();
                if(link.indexOf('http') !== 0) {
                    $(this).val('http://' + link);
                }
            });
        });
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>


@stop