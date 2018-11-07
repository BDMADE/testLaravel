<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $typeofwork->id !!}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{!! $typeofwork->nom !!}</p>
</div>

<!-- Prix Percent Field -->
<div class="form-group">
    {!! Form::label('prix_percent', 'Prix Percent:') !!}
    <p>{!! $typeofwork->prix_percent !!}</p>
</div>

<!-- Prix Fixe Field -->
<div class="form-group">
    {!! Form::label('prix_fixe', 'Prix Fixe:') !!}
    <p>{!! $typeofwork->prix_fixe !!}</p>
</div>

<!-- Appliquer Prixfixe Field -->
<div class="form-group">
    {!! Form::label('appliquer_prixfixe', 'Appliquer Prixfixe:') !!}
    <p>{!! $typeofwork->appliquer_prixfixe !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $typeofwork->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $typeofwork->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $typeofwork->deleted_at !!}</p>
</div>

