<?php

namespace App\Repositories;

use App\Models\Structure;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StructureRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:39 pm UTC
 *
 * @method Structure findWithoutFail($id, $columns = ['*'])
 * @method Structure find($id, $columns = ['*'])
 * @method Structure first($columns = ['*'])
*/
class StructureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'logo',
        'slogan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Structure::class;
    }
}
