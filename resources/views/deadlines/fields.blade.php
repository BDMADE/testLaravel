<!-- Academiclevel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('academiclevel_id', 'Academiclevel Id:') !!}
    {!! Form::number('academiclevel_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nb Heure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nb_heure', 'Nb Heure:') !!}
    {!! Form::number('nb_heure', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Standard Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_standard', 'Prix Standard:') !!}
    {!! Form::number('prix_standard', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Premium Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_premium', 'Prix Premium:') !!}
    {!! Form::number('prix_premium', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('deadlines.index') !!}" class="btn btn-default">Cancel</a>
</div>
