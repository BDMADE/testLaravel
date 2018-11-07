<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Deadline
 * @package App\Models
 * @version January 3, 2018, 8:29 pm UTC
 *
 * @property integer academiclevel_id
 * @property integer nb_heure
 * @property float prix_standard
 * @property float prix_premium
 */
class Deadline extends Model
{
    use SoftDeletes;

    public $table = 'deadlines';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'academiclevel_id',
        'standarddeadline_id',
        'nb_heure',
        'prix_standard',
        'prix_premium'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'academiclevel_id' => 'integer',
        'standarddeadline_id' => 'integer',
        'prix_standard' => 'float',
        'prix_premium' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function deadline()
    {
        return $this->belongsTo(\App\Models\Standarddeadline::class, 'standarddeadline_id');
    }

    public function academicLevel()
    {
        return $this->belongsTo(\App\Models\Academiclevel::class, 'academiclevel_id');
    }
    
}
