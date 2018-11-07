<table class="table table-responsive" id="subjects-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subjects as $subject)
        <tr>
            <td>{!! $subject->nom !!}</td>
            <td>
                {!! Form::open(['route' => ['subjects.destroy', $subject->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subjects.show', [$subject->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subjects.edit', [$subject->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>