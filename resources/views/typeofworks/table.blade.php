<table class="table table-responsive" id="typeofworks-table">
    <thead>
        <tr>
            <th>Nom</th>
        <th>Prix Percent</th>
        <th>Prix Fixe</th>
        <th>Appliquer Prixfixe</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($typeofworks as $typeofwork)
        <tr>
            <td>{!! $typeofwork->nom !!}</td>
            <td>{!! $typeofwork->prix_percent !!}</td>
            <td>{!! $typeofwork->prix_fixe !!}</td>
            <td>{!! $typeofwork->appliquer_prixfixe !!}</td>
            <td>
                {!! Form::open(['route' => ['typeofworks.destroy', $typeofwork->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('typeofworks.show', [$typeofwork->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('typeofworks.edit', [$typeofwork->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>