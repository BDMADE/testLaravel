<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Etat
 * @package App\Models
 * @version January 3, 2018, 8:46 pm UTC
 *
 * @property string nom
 * @property string color
 * @property string bg_color
 */
class Etat extends Model
{
    use SoftDeletes;

    public $table = 'etats';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'color',
        'bg_color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'color' => 'string',
        'bg_color' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
