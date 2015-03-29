

$(document).ready(function() {


    // Searchable list groups
    //
    // Requires a 'data-name' attribute to be set
    // on inner items which will be used for filtering
    $('.list-group-searchable').each(function() {
        var group = $(this);
        var items = group.find('.list-group-item');
        var input = group.find('input.list-group-search-input').first();
        input.on('input', function() {
            var searchText = $(input).val().toLowerCase();
            if (searchText === '') {
                items.show();
            } else {
                items.hide();
                items.filter('[data-name*="'+searchText+'"]').show();
            }
        });
    });

    // Selectable lists input
    $('.select-lists').each(function() {
        var group = $(this);
        var items = group.find('.list-group-item');
        var resultHolder = group.find('.select-lists-results');
        var inputName = group.attr('data-input');
        if (!inputName || !resultHolder) {
            return false;
        }
        items.on('click', function() {
            var text = $(this).text();
            var id = $(this).attr('data-id');
            if (resultHolder.find('[data-id="'+id+'"]').length > 0) {
                return false;
            }
            var name = inputName + '[]';
            resultHolder.append(
                '<div class="list-group-item select-list-result" data-id="'+id+'">'
                    + text
                    + '<input type="hidden" name="'+name+'" value="'+id+'"/>'
                    + '<i class="pull-right fa fa-times" onclick="$(this).parent().remove();"></i>'
                + '</div>'
            );
        });
    });

    $('.select-lists-results').sortable();

});