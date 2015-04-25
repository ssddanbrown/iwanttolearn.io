
@extends('front/base')

@section('title')
    {{ $format->name }} Resources
@stop

@section('description')
    Here is a range of {{ $format->name }} resources for various topics relevant for development.
@stop

@section('body-class', 'white')

@section('content')

    <div class="page-header">
        <div class="container">
            <h1>Resources In {{ $format->name }} Format</h1>
        </div>
    </div>


    <div class="hero-section tight">
        <div class="container">
            <h4><span class="text-primary">{!! $format->getIconCode() !!}</span>&nbsp;&nbsp;&nbsp; {{ count($format->resources) }} Resources Available</h4>
            <br/><br/>

            @if(count($format->resources) === 0)
                <p>Sorry, No resources are available in this format.</p>
            @endif

            @include('front/parts/resource-links', ['resources' => $format->resources->all()])


        </div>
    </div>


@stop