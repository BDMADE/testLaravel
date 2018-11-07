<?php

namespace App\Repositories;

use App\Models\Wordpage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WordpageRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:43 pm UTC
 *
 * @method Wordpage findWithoutFail($id, $columns = ['*'])
 * @method Wordpage find($id, $columns = ['*'])
 * @method Wordpage first($columns = ['*'])
*/
class WordpageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nb_word',
        'percentage_price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Wordpage::class;
    }
}
