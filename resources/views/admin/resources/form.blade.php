<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('link', 'Link', ['class'=>'control-label']) !!}
    {!! Form::text('link', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label>Cost</label><br/>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary">
            {!! Form::radio('cost', 'free') !!} Free
        </label>
        <label class="btn btn-primary">
            {!! Form::radio('cost', 'paid') !!} Paid
        </label>
        <label class="btn btn-primary">
            {!! Form::radio('cost', 'both') !!} Free & Paid
        </label>
    </div>
</div>

@include('admin/parts/tag-selection')

<div class="clearfix"></div>

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

        $('input[name="cost"][checked="checked"]').closest('label.btn').addClass('active');
    });
</script>

@include('admin/parts/errors')