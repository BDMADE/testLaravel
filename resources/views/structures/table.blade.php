<table class="table table-responsive" id="structures-table">
    <thead>
        <tr>
            <th>Logo</th>
        <th>Slogan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($structures as $structure)
        <tr>
            <td>{!! $structure->logo !!}</td>
            <td>{!! $structure->slogan !!}</td>
            <td>
                {!! Form::open(['route' => ['structures.destroy', $structure->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('structures.show', [$structure->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('structures.edit', [$structure->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>