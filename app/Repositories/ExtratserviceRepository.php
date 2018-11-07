<?php

namespace App\Repositories;

use App\Models\Extratservice;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ExtratserviceRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:32 pm UTC
 *
 * @method Extratservice findWithoutFail($id, $columns = ['*'])
 * @method Extratservice find($id, $columns = ['*'])
 * @method Extratservice first($columns = ['*'])
*/
class ExtratserviceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prix_percent',
        'prix_fixe',
        'appliquer_prixfixe'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Extratservice::class;
    }
}
