<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Montant Utile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant_utile', 'Montant Utile:') !!}
    {!! Form::number('montant_utile', null, ['class' => 'form-control']) !!}
</div>

<!-- Montant Reserver Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant_reserver', 'Montant Reserver:') !!}
    {!! Form::number('montant_reserver', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('soldes.index') !!}" class="btn btn-default">Cancel</a>
</div>
