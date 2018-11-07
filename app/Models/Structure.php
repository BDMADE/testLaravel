<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Structure
 * @package App\Models
 * @version January 3, 2018, 8:39 pm UTC
 *
 * @property string logo
 * @property string slogan
 */
class Structure extends Model
{
    use SoftDeletes;

    public $table = 'structures';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'logo',
        'nom',
        'slogan',
        'activation_order_price',
        'seo_description',
        'seo_tag'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'logo' => 'string',
        'slogan' => 'string',
        'seo_description' => 'string',
        'seo_tag' => 'string',
        'activation_order_price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
