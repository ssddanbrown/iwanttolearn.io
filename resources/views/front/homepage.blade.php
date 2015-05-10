
@extends('front/base')

@section('title', 'Find New Places To Learn')
@section('description', 'Find places to learn and grow your knowledge on a variety of subjects such as HTML, PHP, CSS and more. Learning resources are listed by media type so you can find a style of learning that suits you')

@section('content')

    <div class="hero-home hero-section blue">
        <div class="container">
            <h1>Find new places to learn <br/><span class="typedjs">&nbsp;</span></h1>
        </div>
    </div>

    <div class="hero-section">
        <div class="container">
            <h2>Available Topics</h2>
            <div>
                @include('front/parts/tag-links')
            </div>
        </div>
    </div>

    <div class="hero-section white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3><i class="fa fa-code"></i>&nbsp;&nbsp;Learn To Code</h3>
                    <p>This site lists resources for all types of coding and development topics covering various programming languages, frameworks and tools.</p>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-film"></i>&nbsp;&nbsp;Learn By Format</h3>
                    <p>The resources are listed by format so you can find places that teach in the format most suited to you. Formats include videos, books and interactive tutorials.</p>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-lightbulb-o"></i>&nbsp;&nbsp;Discover New Topics</h3>
                    <p>You can browse and discover new topics by listing all the resources that are in your favorite format, whether that's video, book, or article.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-section">
        <div class="container">
            <h2>Browse Resources By Formats</h2>
            <div>
                @include('front/parts/format-links')
            </div>
        </div>
    </div>

    <div class="hero-section white">
        <div class="container">
            <h2>Recently Added Resources</h2>
            @include('front/parts/recent-resources')
        </div>
    </div>

    <script src="/js/typed.min.js"></script>
    <script>
        var tags = {!! json_encode($tags->lists('name')) !!};

        $(document).ready(function() {
            $('.hero-home').css({
                maxHeight: $('.hero-home').outerHeight(),
                minHeight: $('.hero-home').outerHeight()
            });
            $('.typedjs').typed({
                strings: tags,
                contentType: 'html',
                typeSpeed: 100
            });
        });
    </script>
@stop