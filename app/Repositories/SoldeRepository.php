<?php

namespace App\Repositories;

use App\Models\Solde;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SoldeRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:38 pm UTC
 *
 * @method Solde findWithoutFail($id, $columns = ['*'])
 * @method Solde find($id, $columns = ['*'])
 * @method Solde first($columns = ['*'])
*/
class SoldeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'montant_utile',
        'montant_reserver'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Solde::class;
    }
}
