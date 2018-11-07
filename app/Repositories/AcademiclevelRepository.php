<?php

namespace App\Repositories;

use App\Models\Academiclevel;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AcademiclevelRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:20 pm UTC
 *
 * @method Academiclevel findWithoutFail($id, $columns = ['*'])
 * @method Academiclevel find($id, $columns = ['*'])
 * @method Academiclevel first($columns = ['*'])
*/
class AcademiclevelRepository extends BaseRepository
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
        return Academiclevel::class;
    }
}
