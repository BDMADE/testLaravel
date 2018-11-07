<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bonreduction
 * @package App\Models
 * @version January 3, 2018, 8:50 pm UTC
 *
 * @property integer code
 * @property integer date_debut
 * @property integer date_fin
 * @property integer nb_jour_valide
 * @property integer prix_fixe
 * @property integer prix_percent
 * @property boolean applique_prixfixe
 * @property integer nb_user_max
 * @property integer nb_user_utiliser
 */
class Bonreduction extends Model
{
    use SoftDeletes;

    public $table = 'bonreductions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'nom',
        'date_debut',
        'date_fin',
        'prix_fixe',
        'prix_percent',
        'applique_prixfixe',
        'nb_user_max',
        'max_discount',
        'min_spent',
        'nb_user_utiliser'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'nom' => 'string',
        'date_debut' => 'date',
        'date_fin' => 'date',
        'prix_fixe' => 'integer',
        'prix_percent' => 'integer',
        'max_discount' => 'float',
        'min_spent' => 'float',
        'applique_prixfixe' => 'boolean',
        'nb_user_max' => 'integer',
        'nb_user_utiliser' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function isValid(){
        if($this->nb_user_utiliser >= $this->nb_user_max){
            return false;
        }

        if($this->date_fin < date('Y-m-d')){
            return false;
        }
        if($this->date_debut > date('Y-m-d')){
            return false;
        }


        return true;

    }



    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'bonreduction_id');
    }

    public function getType(){
        if($this->applique_prixfixe){
            return '--'; //config('app.currency');
        }else{
            return '%';
        }
    }
    public function getAmount(){
        if($this->applique_prixfixe){
            return $this->prix_fixe;
        }else{
            return $this->prix_percent.'%';
        }
    }
    public function getMaxDiscount(){
        if($this->applique_prixfixe){
            return 'N/A';
        }else{
            return config('app.currency_sombol').$this->max_discount;
        }
    }
    public function getMinSpent(){
        if($this->applique_prixfixe){
            return config('app.currency_sombol').$this->min_spent;
        }else{
            return 'N/A';
        }
    }

    
}
