<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $extratservice->id !!}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{!! $extratservice->nom !!}</p>
</div>

<!-- Prix Percent Field -->
<div class="form-group">
    {!! Form::label('prix_percent', 'Prix Percent:') !!}
    <p>{!! $extratservice->prix_percent !!}</p>
</div>

<!-- Prix Fixe Field -->
<div class="form-group">
    {!! Form::label('prix_fixe', 'Prix Fixe:') !!}
    <p>{!! $extratservice->prix_fixe !!}</p>
</div>

<!-- Appliquer Prixfixe Field -->
<div class="form-group">
    {!! Form::label('appliquer_prixfixe', 'Appliquer Prixfixe:') !!}
    <p>{!! $extratservice->appliquer_prixfixe !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $extratservice->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $extratservice->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $extratservice->deleted_at !!}</p>
</div>

