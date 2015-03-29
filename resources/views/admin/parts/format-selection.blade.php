<div class="form-group">
    <label>Formats</label><br/>
    <div class="row select-lists" data-input="formats">
        <div class="col-md-6 list-group-searchable">
            <div class="list-group-search">
                <input type="text" class="list-group-search-input" placeholder="Search ..."/>
            </div>
            <div class="list-group list-group-scrollable">
                @foreach($formats as $format)
                    <a class="list-group-item list-group-item-thin" data-name="{{ strtolower($format->name) }}" data-id="{{ $format->id }}">
                       {!! $format->getIconCode() !!} {{ $format->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-6 select-lists-results list-group">
            @if(isset($currentFormats))
                @foreach($currentFormats as $format)
                    <div class="list-group-item select-list-result" data-id="{{ $format->id }}">
                        {{ $format->name }}
                        <input type="hidden" name="formats[]" value="{{ $format->id }}">
                        <i class="pull-right fa fa-times" onclick="$(this).parent().remove();"></i>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>