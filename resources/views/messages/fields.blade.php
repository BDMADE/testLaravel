<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Admin Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_id', 'Admin Id:') !!}
    {!! Form::number('admin_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Is Sender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_is_sender', 'User Is Sender:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('user_is_sender', false) !!}
        {!! Form::checkbox('user_is_sender', '1', null) !!} 1
    </label>
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('messages.index') !!}" class="btn btn-default">Cancel</a>
</div>
