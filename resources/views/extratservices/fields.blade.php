<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Percent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_percent', 'Prix Percent:') !!}
    {!! Form::number('prix_percent', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Fixe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_fixe', 'Prix Fixe:') !!}
    {!! Form::number('prix_fixe', null, ['class' => 'form-control']) !!}
</div>

<!-- Appliquer Prixfixe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('appliquer_prixfixe', 'Appliquer Prixfixe:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('appliquer_prixfixe', false) !!}
        {!! Form::checkbox('appliquer_prixfixe', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('extratservices.index') !!}" class="btn btn-default">Cancel</a>
</div>
