<?php

namespace App\Repositories;

use App\Models\Bonreduction;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BonreductionRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:50 pm UTC
 *
 * @method Bonreduction findWithoutFail($id, $columns = ['*'])
 * @method Bonreduction find($id, $columns = ['*'])
 * @method Bonreduction first($columns = ['*'])
*/
class BonreductionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'date_debut',
        'date_fin',
        'nb_jour_valide',
        'prix_fixe',
        'prix_percent',
        'applique_prixfixe',
        'nb_user_max',
        'nb_user_utiliser'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bonreduction::class;
    }
}
