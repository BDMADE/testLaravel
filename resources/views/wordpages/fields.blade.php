<!-- Nb Word Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nb_word', 'Nb Word:') !!}
    {!! Form::number('nb_word', null, ['class' => 'form-control']) !!}
</div>

<!-- Percentage Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('percentage_price', 'Percentage Price:') !!}
    {!! Form::number('percentage_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('wordpages.index') !!}" class="btn btn-default">Cancel</a>
</div>
