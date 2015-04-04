@foreach($resources as $resource)
    <div class="col-md-4 col-sm-6">
        <a href="{{ $resource->link }}" target="_blank" class="resource-item">
            <h4>{{ $resource->name }}</h4>
            <p>{{ $resource->getShortLink(40) }}</p>
            <div class="tags">
                <i class="fa fa-tags"></i>
                @foreach($resource->tags as $tag)
                    <span>{{ $tag->name }}</span>
                @endforeach
            </div>
        </a>
    </div>
@endforeach