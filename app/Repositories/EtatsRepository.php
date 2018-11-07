<?php

namespace App\Repositories;

use App\Models\Etats;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EtatsRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:31 pm UTC
 *
 * @method Etats findWithoutFail($id, $columns = ['*'])
 * @method Etats find($id, $columns = ['*'])
 * @method Etats first($columns = ['*'])
*/
class EtatsRepository extends BaseRepository
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
        return Etats::class;
    }
}
