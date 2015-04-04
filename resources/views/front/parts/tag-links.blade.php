@foreach($tags as $tag)
    <a class="tag-link" href="/t/{{ $tag->slug }}">
        <i class="fa fa-tag"></i>
        {{ $tag->name }}
    </a>
@endforeach