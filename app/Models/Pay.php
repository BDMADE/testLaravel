<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pay
 * @package App\Models
 * @version January 3, 2018, 8:35 pm UTC
 *
 * @property string code
 * @property string code3
 * @property integer indicatif_tel
 * @property string nom
 * @property string nom_fr
 * @property string capital_fr
 */
class Pay extends Model
{
    use SoftDeletes;

    public $table = 'pays';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'code3',
        'indicatif_tel',
        'nom',
        'nom_fr',
        'capital_fr'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'code3' => 'string',
        'indicatif_tel' => 'integer',
        'nom' => 'string',
        'nom_fr' => 'string',
        'capital_fr' => 'string'
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
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'pay_id');
    }



}
