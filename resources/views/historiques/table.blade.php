<table class="table table-responsive" id="historiques-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Operation</th>
        <th>Description</th>
        <th>Montant</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($historiques as $historique)
        <tr>
            <td>{!! $historique->user_id !!}</td>
            <td>{!! $historique->operation !!}</td>
            <td>{!! $historique->description !!}</td>
            <td>{!! $historique->montant !!}</td>
            <td>
                {!! Form::open(['route' => ['historiques.destroy', $historique->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('historiques.show', [$historique->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('historiques.edit', [$historique->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>