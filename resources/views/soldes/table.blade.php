<table class="table table-responsive" id="soldes-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Montant Utile</th>
        <th>Montant Reserver</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($soldes as $solde)
        <tr>
            <td>{!! $solde->user_id !!}</td>
            <td>{!! $solde->montant_utile !!}</td>
            <td>{!! $solde->montant_reserver !!}</td>
            <td>
                {!! Form::open(['route' => ['soldes.destroy', $solde->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('soldes.show', [$solde->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('soldes.edit', [$solde->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>