<table class="table table-responsive" id="extratservices-table">
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
    @foreach($extratservices as $extratservice)
        <tr>
            <td>{!! $extratservice->nom !!}</td>
            <td>{!! $extratservice->prix_percent !!}</td>
            <td>{!! $extratservice->prix_fixe !!}</td>
            <td>{!! $extratservice->appliquer_prixfixe !!}</td>
            <td>
                {!! Form::open(['route' => ['extratservices.destroy', $extratservice->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('extratservices.show', [$extratservice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('extratservices.edit', [$extratservice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>