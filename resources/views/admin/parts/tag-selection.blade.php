<div class="form-group">
    <label>Tags</label><br/>
    <div class="row select-lists" data-input="tags">
        <div class="col-md-6 list-group-searchable">
            <div class="list-group-search">
                <input type="text" class="list-group-search-input" placeholder="Search ..."/>
            </div>
            <div class="list-group list-group-scrollable">
                @foreach($tags as $tag)
                    <a class="list-group-item list-group-item-thin" data-name="{{ strtolower($tag->name) }}" data-id="{{ $tag->id }}">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-6 select-lists-results list-group">
            @if(isset($currentTags))
                @foreach($currentTags as $tag)
                    <div class="list-group-item select-list-result" data-id="{{ $tag->id }}">
                        {{ $tag->name }}
                        <input type="hidden" name="tags[]" value="{{ $tag->id }}">
                        <i class="pull-right fa fa-times" onclick="$(this).parent().remove();"></i>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>