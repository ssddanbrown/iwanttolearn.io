
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

        <div class="col-md-6">
            <h2>The Mission</h2>
            <p>To collect the best resources for a vast range of subjects into a single point of&nbsp;reference. <br/>
                I love learning new things and also love the fact that the internet has made a wide range of learning resources accessible in a variety of formats. I want to create a single point of access to all these fantastic resources so people can quickly find places to learn in the format that suits them.</p>
        </div>

        <div class="col-md-6">
            <h2>How The Site Is Built</h2>
            <p>This site is built upon many brilliant open source projects. <br/>
                I am currently in rapid development with the site but once development levels off i will open up the source for this site on github.</p>
            <ul>
                <li>Host: <a href="https://www.digitalocean.com/?refcode=3e6ce576b856" target="_blank">Digital Ocean</a></li>
                <li>OS: <a href="http://www.ubuntu.com/" target="_blank">Ubuntu 14.04</a></li>
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

@stop