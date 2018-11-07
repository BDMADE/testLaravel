<?php

namespace App\Repositories;

use App\Models\Operation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OperationRepository
 * @package App\Repositories
 * @version January 6, 2018, 9:35 am UTC
 *
 * @method Operation findWithoutFail($id, $columns = ['*'])
 * @method Operation find($id, $columns = ['*'])
 * @method Operation first($columns = ['*'])
*/
class OperationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Operation::class;
    }
}
