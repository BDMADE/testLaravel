<table class="table table-responsive" id="referencements-table">
    <thead>
        <tr>
            <th>Auteur</th>
        <th>Description</th>
        <th>Tag</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($referencements as $referencement)
        <tr>
            <td>{!! $referencement->auteur !!}</td>
            <td>{!! $referencement->description !!}</td>
            <td>{!! $referencement->tag !!}</td>
            <td>
                {!! Form::open(['route' => ['referencements.destroy', $referencement->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('referencements.show', [$referencement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('referencements.edit', [$referencement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>