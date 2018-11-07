<?php

namespace App\Repositories;

use App\Models\Referencement;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReferencementRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:36 pm UTC
 *
 * @method Referencement findWithoutFail($id, $columns = ['*'])
 * @method Referencement find($id, $columns = ['*'])
 * @method Referencement first($columns = ['*'])
*/
class ReferencementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'auteur',
        'description',
        'tag'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Referencement::class;
    }
}
