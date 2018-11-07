<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Standarddeadline
 * @package App\Models
 * @version January 6, 2018, 9:27 am UTC
 *
 * @property string nom
 */
class Standarddeadline extends Model
{
    use SoftDeletes;

    public $table = 'standarddeadlines';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'nb_days'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'nb_days' => 'integer'
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
    public function deadline()
    {
        return $this->hasMany(\App\Models\Deadline::class, 'academiclevel_id');
    }


}
