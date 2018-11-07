<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $deadline->id !!}</p>
</div>

<!-- Academiclevel Id Field -->
<div class="form-group">
    {!! Form::label('academiclevel_id', 'Academiclevel Id:') !!}
    <p>{!! $deadline->academiclevel_id !!}</p>
</div>

<!-- Nb Heure Field -->
<div class="form-group">
    {!! Form::label('nb_heure', 'Nb Heure:') !!}
    <p>{!! $deadline->nb_heure !!}</p>
</div>

<!-- Prix Standard Field -->
<div class="form-group">
    {!! Form::label('prix_standard', 'Prix Standard:') !!}
    <p>{!! $deadline->prix_standard !!}</p>
</div>

<!-- Prix Premium Field -->
<div class="form-group">
    {!! Form::label('prix_premium', 'Prix Premium:') !!}
    <p>{!! $deadline->prix_premium !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $deadline->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $deadline->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $deadline->deleted_at !!}</p>
</div>

