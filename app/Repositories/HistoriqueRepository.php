<?php

namespace App\Repositories;

use App\Models\Historique;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HistoriqueRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:49 pm UTC
 *
 * @method Historique findWithoutFail($id, $columns = ['*'])
 * @method Historique find($id, $columns = ['*'])
 * @method Historique first($columns = ['*'])
*/
class HistoriqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'operation',
        'description',
        'montant'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Historique::class;
    }
}
