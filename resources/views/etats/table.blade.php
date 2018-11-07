<table class="table table-responsive" id="etats-table">
    <thead>
        <tr>
            <th>Nom</th>
        <th>Color</th>
        <th>Bg Color</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($etats as $etat)
        <tr>
            <td>{!! $etat->nom !!}</td>
            <td>{!! $etat->color !!}</td>
            <td>{!! $etat->bg_color !!}</td>
            <td>
                {!! Form::open(['route' => ['etats.destroy', $etat->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('etats.show', [$etat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('etats.edit', [$etat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>