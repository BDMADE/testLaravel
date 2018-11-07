<table class="table table-responsive" id="wordpages-table">
    <thead>
        <tr>
            <th>Nb Word</th>
        <th>Percentage Price</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($wordpages as $wordpage)
        <tr>
            <td>{!! $wordpage->nb_word !!}</td>
            <td>{!! $wordpage->percentage_price !!}</td>
            <td>
                {!! Form::open(['route' => ['wordpages.destroy', $wordpage->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('wordpages.show', [$wordpage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('wordpages.edit', [$wordpage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>