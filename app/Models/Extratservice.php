<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Extratservice
 * @package App\Models
 * @version January 3, 2018, 8:32 pm UTC
 *
 * @property string nom
 * @property float prix_percent
 * @property float prix_fixe
 * @property boolean appliquer_prixfixe
 */
class Extratservice extends Model
{
    use SoftDeletes;

    public $table = 'extratservices';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
        'prix_percent',
        'prix_fixe',
        'appliquer_prixfixe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'prix_percent' => 'float',
        'prix_fixe' => 'float',
        'appliquer_prixfixe' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
