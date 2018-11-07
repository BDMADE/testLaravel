<table class="table table-responsive" id="userslevels-table">
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
    @foreach($userslevels as $userslevel)
        <tr>
            <td>{!! $userslevel->nom !!}</td>
            <td>{!! $userslevel->prix_percent !!}</td>
            <td>{!! $userslevel->prix_fixe !!}</td>
            <td>{!! $userslevel->appliquer_prixfixe !!}</td>
            <td>
                {!! Form::open(['route' => ['userslevels.destroy', $userslevel->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('userslevels.show', [$userslevel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('userslevels.edit', [$userslevel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>