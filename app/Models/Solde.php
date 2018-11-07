<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Solde
 * @package App\Models
 * @version January 3, 2018, 8:38 pm UTC
 *
 * @property integer user_id
 * @property float montant_utile
 * @property float montant_reserver
 */
class Solde extends Model
{
    use SoftDeletes;

    public $table = 'soldes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'montant_utile',
        'montant_reserver'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'montant_utile' => 'float',
        'montant_reserver' => 'float'
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
