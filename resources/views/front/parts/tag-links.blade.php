@foreach($tags as $tag)
    <a class="tag-link" href="/t/{{ $tag->slug }}">
        {{ $tag->name }}
    </a>
@endforeach