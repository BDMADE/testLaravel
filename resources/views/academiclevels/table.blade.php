<table class="table table-responsive" id="academiclevels-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($academiclevels as $academiclevel)
        <tr>
            <td>{!! $academiclevel->nom !!}</td>
            <td>
                {!! Form::open(['route' => ['academiclevels.destroy', $academiclevel->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('academiclevels.show', [$academiclevel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('academiclevels.edit', [$academiclevel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>