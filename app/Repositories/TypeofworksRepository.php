<?php

namespace App\Repositories;

use App\Models\Typeofwork;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TypeofworksRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:40 pm UTC
 *
 * @method Typeofworks findWithoutFail($id, $columns = ['*'])
 * @method Typeofworks find($id, $columns = ['*'])
 * @method Typeofworks first($columns = ['*'])
*/
class TypeofworksRepository extends BaseRepository
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
        return Typeofwork::class;
    }
}
