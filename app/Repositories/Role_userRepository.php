<?php

namespace App\Repositories;

use App\Models\Role_user;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Role_userRepository
 * @package App\Repositories
 * @version January 3, 2018, 8:38 pm UTC
 *
 * @method Role_user findWithoutFail($id, $columns = ['*'])
 * @method Role_user find($id, $columns = ['*'])
 * @method Role_user first($columns = ['*'])
*/
class Role_userRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'role_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Role_user::class;
    }
}
