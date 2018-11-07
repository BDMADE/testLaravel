<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Code3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code3', 'Code3:') !!}
    {!! Form::text('code3', null, ['class' => 'form-control']) !!}
</div>

<!-- Indicatif Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('indicatif_tel', 'Indicatif Tel:') !!}
    {!! Form::number('indicatif_tel', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Fr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom_fr', 'Nom Fr:') !!}
    {!! Form::text('nom_fr', null, ['class' => 'form-control']) !!}
</div>

<!-- Capital Fr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capital_fr', 'Capital Fr:') !!}
    {!! Form::text('capital_fr', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pays.index') !!}" class="btn btn-default">Cancel</a>
</div>
