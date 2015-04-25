<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug', ['class'=>'control-label']) !!}
    {!! Form::text('slug', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('plural', 'Plural Name', ['class'=>'control-label']) !!}
    {!! Form::text('plural', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('order', 'Order Priority', ['class'=>'control-label']) !!}
    {!! Form::number('order', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('icon', 'Icon', ['class'=>'control-label']) !!}
    <div class="input-group">
        <div class="input-group-addon"><i id="icon"></i></div>
        {!! Form::text('icon', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
</div>

<script>

    /** Icon and plural autofill */
    $(document).ready(function() {
        var icon = $('input[name="icon"]').first();

        function loadIcon() {
            var value = icon.val();
            $('#icon').attr('class', 'fa fa-' + value);
        }

        icon.on('input', function() {
            loadIcon();
        });

        loadIcon();

        var plural = $('input[name="plural"]').first();
        $('input[name="name"]').change(function() {
            if(plural.val() === '') {
                var value = $(this).val();
                plural.val(value + 's');
            };
        });
    });

    /** Slug autofill */
    $(document).ready(function() {
        var slug = $('input[name="slug"]').first();
        $('input[name="name"]').change(function() {
            if(slug.val() === '') {
                var name = $(this).val();
                slug.val(name.replace(/ /g, '-').toLowerCase())
            }
        });
    });
</script>

@include('admin/parts/errors')