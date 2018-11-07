<?php

namespace App\Repositories;

use App\Models\Deadline;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DeadlineRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:29 pm UTC
 *
 * @method Deadline findWithoutFail($id, $columns = ['*'])
 * @method Deadline find($id, $columns = ['*'])
 * @method Deadline first($columns = ['*'])
*/
class DeadlineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'academiclevel_id',
        'nb_heure',
        'prix_standard',
        'prix_premium'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Deadline::class;
    }
}
