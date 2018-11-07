<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', 'Logo:') !!}
    {!! Form::text('logo', null, ['class' => 'form-control']) !!}
</div>

<!-- Slogan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slogan', 'Slogan:') !!}
    {!! Form::text('slogan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('structures.index') !!}" class="btn btn-default">Cancel</a>
</div>
