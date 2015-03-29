<div class="form-group">
    {!! Form::label('title', 'Title', ['class'=>'control-label']) !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('link', 'Link', ['class'=>'control-label']) !!}
    {!! Form::text('link', null, ['class'=>'form-control']) !!}
</div>

@include('admin/parts/tag-selection')

<div class="form-group">
    {!! Form::label('description', 'Description', ['class'=>'control-label']) !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
</div>

<script>
    $(document).ready(function() {

        $('input[name="link"]').first().change(function() {
            var link = $(this).val();
            if(link.indexOf('http') !== 0) {
                $(this).val('http://' + link);
            }
        });

    });
</script>

@include('admin/parts/errors')