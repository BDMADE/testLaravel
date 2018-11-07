<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Referencement
 * @package App\Models
 * @version January 3, 2018, 8:36 pm UTC
 *
 * @property string auteur
 * @property string description
 * @property string tag
 */
class Referencement extends Model
{
    use SoftDeletes;

    public $table = 'referencements';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'auteur',
        'description',
        'tag'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'auteur' => 'string',
        'description' => 'string',
        'tag' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
