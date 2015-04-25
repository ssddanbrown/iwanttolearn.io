
@extends('front/base')

@section('title', 'What this site is about')
@section('description', 'I love learning new things and also love the fact that the internet has made a wide range of learning resources accessible in a variety of formats. I want to create a single point of access to all these fantastic resources so people can quickly find places to learn in the format that suits them.')

@section('content')


    <div class="page-header">
        <div class="container">
            <h1>About iwanttolearn.io</h1>
        </div>
    </div>

    <div class="container hero-section tight">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-rocket"></i> The Mission</div>
                    <div class="panel-body">
                        <blockquote>
                            To collect the best resources for a vast range of subjects into a single point of&nbsp;reference.
                        </blockquote>
                        <p> I love learning new things and also love the fact that the internet has made a wide range of learning resources accessible in a variety of formats. I want to create a single point of access to all these fantastic resources so people can quickly find places to learn in the format that suits them.</p>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-user"></i> Who I Am</div>
                    <div class="panel-body">
                        <p>My name is Dan Brown. I am a full-stack developer at <a href="http://clever-touch.com/">CleverTouch</a>. I love new technology, Especially web technology since you can build experiences and programmes using almost no resources. I get a real kick out of the creation side of development, whether that's in function or design, particularly when it has a use to others.
                            <br/>You can contact me on using links below:</p>
                        <ul>
                            <li><a  target="_blank" href="http://danb.me"><i class="fa fa-home"></i> &nbsp;&nbsp;danb.me</a></li>
                            <li><a target="_blank" href="mailto:ssd.dan.brown@googlemail.com"><i class="fa fa-envelope"></i> &nbsp;&nbsp;ssddanbrown@googlemail.com</a></li>
                            <li><a href="https://github.com/ssddanbrown" target="_blank"><i class="fa fa-github"></i> &nbsp;&nbsp;Github</a></li>
                            <li><a href="http://uk.linkedin.com/in/danjamesbrown" target="_blank"><i class="fa fa-linkedin"></i>  &nbsp;&nbsp;LinkedIn</a></li>
                            <li><a href="https://plus.google.com/102972469186357098848/about" target="_blank"><i class="fa fa-google-plus"></i> &nbsp;&nbsp;Google+</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-wrench"></i> How The Site Is Built</div>
                    <div class="panel-body">
                        <p>This site is built upon many brilliant open source projects. Here is an overview of what this site runs on:</p>
                        <ul>
                            <li>Host: <a href="https://www.digitalocean.com/?refcode=3e6ce576b856" target="_blank">Digital Ocean</a></li>
                            <li>OS: <a href="http://www.ubuntu.com/" target="_blank">Ubuntu 14.04</a></li>
                            <li>Server Stack: <a target="_blank" href="http://nginx.org/">NGINX</a> + <a target="_blank" href="https://github.com/facebook/hhvm">HHVM</a> +
                                <a target="_blank" href="http://redis.io/">Redis</a></li>
                            <li>Framework: <a href="http://laravel.com/" target="_blank">Laravel</a></li>
                            <li>Styling: <a href="http://getbootstrap.com/" target="_blank">Bootstrap</a> & <a href="http://sass-lang.com/" target="_blank">Sass</a></li>
                            <li>Icons: <a href="http://fontawesome.io/" target="_blank">Font-awesome icon font</a></li>
                            <li>
                                JS Libraries:
                                <a target="_blank" href="https://jquery.com/">Jquery</a>,
                                <a target="_blank" href="http://www.mattboldt.com/demos/typed-js/">Typed.js</a> &
                                <a target="_blank" href="http://masonry.desandro.com/">masonry.js</a>
                            </li>
                        </ul>
                        <br/>
                        <p>The source to this site is also open under the MIT licence, the source can be found here: </p>
                        <a class="btn btn-default" target="_blank" href="https://github.com/ssddanbrown/iwanttolearn.io"><i class="fa fa-github"></i> View On Github</a>
                        <br/>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-signal"></i> Site Statistics</div>
                    <div class="list-group">
                        <div class="list-group-item">Total Topics: {{ $totals['tags'] }}</div>
                        <div class="list-group-item">Total Resources: {{ $totals['resources'] }}</div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@stop