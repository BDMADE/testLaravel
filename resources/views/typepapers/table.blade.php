<table class="table table-responsive" id="typepapers-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($typepapers as $typepaper)
        <tr>
            <td>{!! $typepaper->nom !!}</td>
            <td>
                {!! Form::open(['route' => ['typepapers.destroy', $typepaper->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('typepapers.show', [$typepaper->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('typepapers.edit', [$typepaper->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>