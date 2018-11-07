<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>Id</th>
        <th>Role Id</th>
        <th>Login</th>
        <th>Name</th>
        <th>Email</th>
        <th>Avatar</th>
        <th>Tel1</th>
        <th>Tel2</th>
        <th>Sexe</th>
        <th>Remember Token</th>
        <th>Password</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->id !!}</td>
            <td>{!! $user->role_id !!}</td>
            <td>{!! $user->login !!}</td>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->avatar !!}</td>
            <td>{!! $user->tel1 !!}</td>
            <td>{!! $user->tel2 !!}</td>
            <td>{!! $user->sexe !!}</td>
            <td>{!! $user->remember_token !!}</td>
            <td>{!! $user->password !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>