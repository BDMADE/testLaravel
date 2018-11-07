<?php

namespace App\Repositories;

use App\Models\Standarddeadline;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StandarddeadlineRepository
 * @package App\Repositories
 * @version January 6, 2018, 9:27 am UTC
 *
 * @method Standarddeadline findWithoutFail($id, $columns = ['*'])
 * @method Standarddeadline find($id, $columns = ['*'])
 * @method Standarddeadline first($columns = ['*'])
*/
class StandarddeadlineRepository extends BaseRepository
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
        return Standarddeadline::class;
    }
}
