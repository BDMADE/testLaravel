<table class="table table-responsive" id="orders-table">
    <thead>
        <tr>
            <th>Typepapers Id</th>
        <th>Typeformat Id</th>
        <th>Wordpage Id</th>
        <th>Academiclevel Id</th>
        <th>Deadline Id</th>
        <th>Userslevel Id</th>
        <th>Extratservice Id</th>
        <th>Bonreduction Id</th>
        <th>Etat Id</th>
        <th>Typeofwork Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{!! $order->typepapers_id !!}</td>
            <td>{!! $order->typeformat_id !!}</td>
            <td>{!! $order->wordpage_id !!}</td>
            <td>{!! $order->academiclevel_id !!}</td>
            <td>{!! $order->deadline_id !!}</td>
            <td>{!! $order->userslevel_id !!}</td>
            <td>{!! $order->extratservice_id !!}</td>
            <td>{!! $order->bonreduction_id !!}</td>
            <td>{!! $order->etat_id !!}</td>
            <td>{!! $order->typeofwork_id !!}</td>
            <td>
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>