<?php

namespace App\Repositories;

use App\Models\Pays;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaysRepository
 * @package App\Repositories
 * @version January 3, 2018, 9:38 am UTC
 *
 * @method Pays findWithoutFail($id, $columns = ['*'])
 * @method Pays find($id, $columns = ['*'])
 * @method Pays first($columns = ['*'])
*/
class PaysRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'code3',
        'indicatif_tel',
        'nom',
        'nom_fr'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pays::class;
    }
}
