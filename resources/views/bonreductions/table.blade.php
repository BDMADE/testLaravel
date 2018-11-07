<table class="table table-responsive" id="bonreductions-table">
    <thead>
        <tr>
            <th>Code</th>
        <th>Date Debut</th>
        <th>Date Fin</th>
        <th>Nb Jour Valide</th>
        <th>Prix Fixe</th>
        <th>Prix Percent</th>
        <th>Applique Prixfixe</th>
        <th>Nb User Max</th>
        <th>Nb User Utiliser</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bonreductions as $bonreduction)
        <tr>
            <td>{!! $bonreduction->code !!}</td>
            <td>{!! $bonreduction->date_debut !!}</td>
            <td>{!! $bonreduction->date_fin !!}</td>
            <td>{!! $bonreduction->nb_jour_valide !!}</td>
            <td>{!! $bonreduction->prix_fixe !!}</td>
            <td>{!! $bonreduction->prix_percent !!}</td>
            <td>{!! $bonreduction->applique_prixfixe !!}</td>
            <td>{!! $bonreduction->nb_user_max !!}</td>
            <td>{!! $bonreduction->nb_user_utiliser !!}</td>
            <td>
                {!! Form::open(['route' => ['bonreductions.destroy', $bonreduction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bonreductions.show', [$bonreduction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('bonreductions.edit', [$bonreduction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>