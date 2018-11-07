<?php

namespace App\Repositories;

use App\Models\Userslevel;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserslevelRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:42 pm UTC
 *
 * @method Userslevel findWithoutFail($id, $columns = ['*'])
 * @method Userslevel find($id, $columns = ['*'])
 * @method Userslevel first($columns = ['*'])
*/
class UserslevelRepository extends BaseRepository
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
        return Userslevel::class;
    }
}
