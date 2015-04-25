@foreach($formats as $format)
    <a class="tag-link" href="{{ $format->link() }}">
        {!! $format->getIconCode() !!}
        {{ $format->plural }}
    </a>
@endforeach