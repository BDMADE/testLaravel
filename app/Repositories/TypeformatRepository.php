<?php

namespace App\Repositories;

use App\Models\Typeformat;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TypeformatRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:40 pm UTC
 *
 * @method Typeformat findWithoutFail($id, $columns = ['*'])
 * @method Typeformat find($id, $columns = ['*'])
 * @method Typeformat first($columns = ['*'])
*/
class TypeformatRepository extends BaseRepository
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
        return Typeformat::class;
    }
}
