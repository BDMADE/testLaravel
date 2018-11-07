<table class="table table-responsive" id="deadlines-table">
    <thead>
        <tr>
            <th>Academiclevel Id</th>
        <th>Nb Heure</th>
        <th>Prix Standard</th>
        <th>Prix Premium</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($deadlines as $deadline)
        <tr>
            <td>{!! $deadline->academiclevel_id !!}</td>
            <td>{!! $deadline->nb_heure !!}</td>
            <td>{!! $deadline->prix_standard !!}</td>
            <td>{!! $deadline->prix_premium !!}</td>
            <td>
                {!! Form::open(['route' => ['deadlines.destroy', $deadline->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('deadlines.show', [$deadline->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('deadlines.edit', [$deadline->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>