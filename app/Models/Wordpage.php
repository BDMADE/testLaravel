<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wordpage
 * @package App\Models
 * @version January 3, 2018, 8:43 pm UTC
 *
 * @property integer nb_word
 * @property float percentage_price
 */
class Wordpage extends Model
{
    use SoftDeletes;

    public $table = 'wordpages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'nb_word',
        'percentage_price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'nb_word' => 'integer',
        'percentage_price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'user_id');
    }

    
}
