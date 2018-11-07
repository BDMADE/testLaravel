<?php

namespace App\Repositories;

use App\Models\File;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FileRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:33 pm UTC
 *
 * @method File findWithoutFail($id, $columns = ['*'])
 * @method File find($id, $columns = ['*'])
 * @method File first($columns = ['*'])
*/
class FileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
        'nom',
        'type',
        'emplacement'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return File::class;
    }
}
