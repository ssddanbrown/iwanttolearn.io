
@extends('front/base')

@section('title', 'What this site is about')
@section('description', 'I love learning new things and also love the fact that the internet has made a wide range of learning resources accessible in a variety of formats. I want to create a single point of access to all these fantastic resources so people can quickly find places to learn in the format that suits them.')

@section('content')


    <div class="page-header">
        <div class="container">
            <h1>About iwanttolearn.io</h1>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h2>The Mission</h2>
                <p>To collect the best resources for a vast range of subjects into a single point of&nbsp;reference. <br/>
                    I love learning new things and also love the fact that the internet has made a wide range of learning resources accessible in a variety of formats. I want to create a single point of access to all these fantastic resources so people can quickly find places to learn in the format that suits them.</p>

                <h2>Who I Am</h2>
                <p>My name is Dan Brown. I am a full-stack developer at <a href="http://clever-touch.com/">CleverTouch</a>. I love new technology, Especially web technology since you can build experiences and programmes using almost no resources. I get a real kick out of the creation side of development, whether that's in function or design, particularly when it has a use to others.
                    <br/>You can contact me on using links below:</p>
                <ul>
                    <li><a  target="_blank" href="http://danb.me"><i class="fa fa-home"></i> &nbsp;&nbsp;danb.me</a></li>
                    <li><a target="_blank" href="mailto:ssd.dan.brown@googlemail.com"><i class="fa fa-envelope"></i> &nbsp;&nbsp;ssddanbrown@googlemail.com</a></li>
                    <li><a href="https://github.com/ssddanbrown" target="_blank"><i class="fa fa-github"></i> &nbsp;&nbsp;Github</a></li>
                    <li><a href="http://uk.linkedin.com/in/sandcat" target="_blank"><i class="fa fa-linkedin"></i>  &nbsp;&nbsp;LinkedIn</a></li>
                    <li><a href="https://plus.google.com/102972469186357098848/about" target="_blank"><i class="fa fa-google-plus"></i> &nbsp;&nbsp;Google+</a></li>
                </ul>
            </div>

            <div class="col-md-6">
                <h2>How The Site Is Built</h2>
                <p>This site is built upon many brilliant open source projects. <br/>
                    I am currently in rapid development with the site but once development levels off i will open up the source for this site on github.</p>
                <ul>
                    <li>Host: <a href="https://www.digitalocean.com/?refcode=3e6ce576b856" target="_blank">Digital Ocean</a></li>
                    <li>OS: <a href="http://www.ubuntu.com/" target="_blank">Ubuntu 14.04</a></li>
                    <li>Server Stack: <a target="_blank" href="http://nginx.org/">NGINX</a> + <a target="_blank" href="https://github.com/facebook/hhvm">HHVM</a></li>
                    <li>Framework: <a href="http://laravel.com/" target="_blank">Laravel</a></li>
                    <li>Styling: <a href="http://getbootstrap.com/" target="_blank">Bootstrap</a> & <a href="http://sass-lang.com/" target="_blank">Sass</a></li>
                    <li>Icons: <a href="http://fontawesome.io/" target="_blank">Font-awesome icon font</a></li>
                    <li>
                        JS Libraries:
                        <a href="https://jquery.com/">Jquery</a> & <a href="http://www.mattboldt.com/demos/typed-js/">Typed.js</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

@stop