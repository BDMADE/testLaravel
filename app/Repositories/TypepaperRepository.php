<?php

namespace App\Repositories;

use App\Models\Typepaper;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TypepaperRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:41 pm UTC
 *
 * @method Typepaper findWithoutFail($id, $columns = ['*'])
 * @method Typepaper find($id, $columns = ['*'])
 * @method Typepaper first($columns = ['*'])
*/
class TypepaperRepository extends BaseRepository
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
        return Typepaper::class;
    }
}
