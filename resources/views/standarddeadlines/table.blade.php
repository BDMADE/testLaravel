<table class="table table-responsive" id="standarddeadlines-table">
    <thead>
        <tr>
            <th>Nom</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($standarddeadlines as $standarddeadline)
        <tr>
            <td>{!! $standarddeadline->nom !!}</td>
            <td>
                {!! Form::open(['route' => ['standarddeadlines.destroy', $standarddeadline->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('standarddeadlines.show', [$standarddeadline->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('standarddeadlines.edit', [$standarddeadline->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>