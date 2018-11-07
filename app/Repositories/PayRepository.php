<?php

namespace App\Repositories;

use App\Models\Pay;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PayRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:35 pm UTC
 *
 * @method Pay findWithoutFail($id, $columns = ['*'])
 * @method Pay find($id, $columns = ['*'])
 * @method Pay first($columns = ['*'])
*/
class PayRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'code3',
        'indicatif_tel',
        'nom',
        'nom_fr',
        'capital_fr'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pay::class;
    }
}
