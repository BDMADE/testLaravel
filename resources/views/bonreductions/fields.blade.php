<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::number('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_debut', 'Date Debut:') !!}
    {!! Form::number('date_debut', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_fin', 'Date Fin:') !!}
    {!! Form::number('date_fin', null, ['class' => 'form-control']) !!}
</div>

<!-- Nb Jour Valide Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nb_jour_valide', 'Nb Jour Valide:') !!}
    {!! Form::number('nb_jour_valide', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Fixe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_fixe', 'Prix Fixe:') !!}
    {!! Form::number('prix_fixe', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Percent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_percent', 'Prix Percent:') !!}
    {!! Form::number('prix_percent', null, ['class' => 'form-control']) !!}
</div>

<!-- Applique Prixfixe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('applique_prixfixe', 'Applique Prixfixe:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('applique_prixfixe', false) !!}
        {!! Form::checkbox('applique_prixfixe', '1', null) !!} 1
    </label>
</div>

<!-- Nb User Max Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nb_user_max', 'Nb User Max:') !!}
    {!! Form::number('nb_user_max', null, ['class' => 'form-control']) !!}
</div>

<!-- Nb User Utiliser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nb_user_utiliser', 'Nb User Utiliser:') !!}
    {!! Form::number('nb_user_utiliser', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bonreductions.index') !!}" class="btn btn-default">Cancel</a>
</div>
