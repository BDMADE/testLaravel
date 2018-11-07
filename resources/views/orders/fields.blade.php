<!-- Typepapers Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('typepapers_id', 'Typepapers Id:') !!}
    {!! Form::number('typepapers_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Typeformat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('typeformat_id', 'Typeformat Id:') !!}
    {!! Form::number('typeformat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Wordpage Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('wordpage_id', 'Wordpage Id:') !!}
    {!! Form::number('wordpage_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Academiclevel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('academiclevel_id', 'Academiclevel Id:') !!}
    {!! Form::number('academiclevel_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Deadline Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deadline_id', 'Deadline Id:') !!}
    {!! Form::number('deadline_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Userslevel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userslevel_id', 'Userslevel Id:') !!}
    {!! Form::number('userslevel_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Extratservice Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extratservice_id', 'Extratservice Id:') !!}
    {!! Form::number('extratservice_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bonreduction Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bonreduction_id', 'Bonreduction Id:') !!}
    {!! Form::number('bonreduction_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Etat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etat_id', 'Etat Id:') !!}
    {!! Form::number('etat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Typeofwork Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('typeofwork_id', 'Typeofwork Id:') !!}
    {!! Form::number('typeofwork_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>
