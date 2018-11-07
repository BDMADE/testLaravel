<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Historique
 * @package App\Models
 * @version January 3, 2018, 8:49 pm UTC
 *
 * @property integer user_id
 * @property string operation
 * @property string description
 * @property float montant
 */
class Historique extends Model
{
    use SoftDeletes;

    public $table = 'historiques';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'operation_id',
        'description',
        'montant'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'operation_id' => 'integer',
        'description' => 'string',
        'montant' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
    
}
