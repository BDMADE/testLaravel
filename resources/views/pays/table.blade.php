<table class="table table-responsive" id="pays-table">
    <thead>
        <tr>
            <th>Code</th>
        <th>Code3</th>
        <th>Indicatif Tel</th>
        <th>Nom</th>
        <th>Nom Fr</th>
        <th>Capital Fr</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pays as $pay)
        <tr>
            <td>{!! $pay->code !!}</td>
            <td>{!! $pay->code3 !!}</td>
            <td>{!! $pay->indicatif_tel !!}</td>
            <td>{!! $pay->nom !!}</td>
            <td>{!! $pay->nom_fr !!}</td>
            <td>{!! $pay->capital_fr !!}</td>
            <td>
                {!! Form::open(['route' => ['pays.destroy', $pay->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pays.show', [$pay->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pays.edit', [$pay->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>