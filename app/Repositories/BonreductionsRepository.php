<?php

namespace App\Repositories;

use App\Models\Bonreductions;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BonreductionsRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:27 pm UTC
 *
 * @method Bonreductions findWithoutFail($id, $columns = ['*'])
 * @method Bonreductions find($id, $columns = ['*'])
 * @method Bonreductions first($columns = ['*'])
*/
class BonreductionsRepository extends BaseRepository
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
        return Bonreductions::class;
    }
}
