<?php

namespace App\Repositories;

use App\Models\Term;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TermRepository
 * @package App\Repositories
 * @version February 6, 2018, 6:58 pm UTC
 *
 * @method Term findWithoutFail($id, $columns = ['*'])
 * @method Term find($id, $columns = ['*'])
 * @method Term first($columns = ['*'])
*/
class TermRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Term::class;
    }
}
