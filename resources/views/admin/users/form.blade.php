<div class="form-group">
    {!! Form::label('name', 'Display Name', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', ['class'=>'control-label']) !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
</div>

<p class="text-danger"><strong>If you want to change your password fill in the following fields:</strong></p>

<div class="form-group">
    {!! Form::label('password', 'Password', ['class'=>'control-label']) !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password-confirm', 'Confirm Password', ['class'=>'control-label']) !!}
    {!! Form::password('password-confirm', ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
</div>

@include('admin/parts/errors')