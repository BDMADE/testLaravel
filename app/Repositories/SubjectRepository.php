<?php

namespace App\Repositories;

use App\Models\Subject;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubjectRepository
 * @package App\Repositories
 * @version January 6, 2018, 9:24 am UTC
 *
 * @method Subject findWithoutFail($id, $columns = ['*'])
 * @method Subject find($id, $columns = ['*'])
 * @method Subject first($columns = ['*'])
*/
class SubjectRepository extends BaseRepository
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
        return Subject::class;
    }
}
