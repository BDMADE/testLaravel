<?php

namespace App\Repositories;

use App\Models\Typeofwork;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TypeofworkRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:48 pm UTC
 *
 * @method Typeofwork findWithoutFail($id, $columns = ['*'])
 * @method Typeofwork find($id, $columns = ['*'])
 * @method Typeofwork first($columns = ['*'])
*/
class TypeofworkRepository extends BaseRepository
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
