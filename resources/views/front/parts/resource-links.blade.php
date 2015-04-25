@foreach(array_chunk($resources, 3) as $resourceChunk)
    <div class="row">
        @foreach($resourceChunk as $resource)
            <div class="col-md-4 col-sm-6">
                <div class="resource-item">
                    <a href="{{ $resource->link }}" target="_blank">
                        <h4>{{ $resource->name }}</h4>
                        <p>{{ $resource->getShortLink(40) }}</p>
                    </a>
                    <div class="tags">
                        @foreach($resource->tags as $tag)
                            <a class="resource-item-tag-link" href="{{ $tag->link() }}">
                                <i class="fa fa-tag"></i><span>{{ $tag->name }}</span>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endforeach