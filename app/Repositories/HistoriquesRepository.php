<?php

namespace App\Repositories;

use App\Models\Historiques;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HistoriquesRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:33 pm UTC
 *
 * @method Historiques findWithoutFail($id, $columns = ['*'])
 * @method Historiques find($id, $columns = ['*'])
 * @method Historiques first($columns = ['*'])
*/
class HistoriquesRepository extends BaseRepository
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
        return Historiques::class;
    }
}
