<?php

namespace App\Repositories;

use App\Models\Etat;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EtatRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:46 pm UTC
 *
 * @method Etat findWithoutFail($id, $columns = ['*'])
 * @method Etat find($id, $columns = ['*'])
 * @method Etat first($columns = ['*'])
*/
class EtatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'color',
        'bg_color'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Etat::class;
    }
}
