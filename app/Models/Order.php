<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version January 3, 2018, 8:34 pm UTC
 *
 * @property integer typepapers_id
 * @property integer typeformat_id
 * @property integer wordpage_id
 * @property integer academiclevel_id
 * @property integer deadline_id
 * @property integer userslevel_id
 * @property integer extratservice_id
 * @property integer bonreduction_id
 * @property integer etat_id
 * @property integer typeofwork_id
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'writer',
        'ref',
        'typepapers_id',
        'subject_id',
        'typeformat_id',
        'wordpage_id',
        'deadline_id',
        'userslevel_id',
        'extratservice_id',
        'bonreduction_id',
        'etat',
        'typeofwork_id',
        'number_of_page',
        'montant',
        'montant_payer',
        'is_premium',
        'topic',
        'description',
        'source',
        'active',
        'est_noter',
        'note',
        'commentaire_user'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'writer' => 'integer',
        'ref' => 'string',
        'typepapers_id' => 'integer',
        'subject_id' => 'integer',
        'typeformat_id' => 'integer',
        'wordpage_id' => 'integer',
        'deadline_id' => 'integer',
        'userslevel_id' => 'integer',
        'extratservice_id' => 'integer',
        'bonreduction_id' => 'integer',
        'etat' => 'string',
        'typeofwork_id' => 'integer',
        'number_of_page' => 'integer',
        'montant' => 'float',
        'is_premium' => 'boolean',
        'montant_payer' => 'float',
        'topic' => 'string',
        'description' => 'string',
        'source' => 'integer',
        'active' => 'boolean',
        'est_noter' => 'boolean',
        'note' => 'integer',
        'commentaire_user' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public  function getDefaultState(){
        return strtoupper("recent orders");
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
    public function thewriter()
    {
        return $this->belongsTo(\App\Models\User::class, 'writer');
    }

    public function academicDeadline()
    {
        return $this->belongsTo(\App\Models\Deadline::class, 'deadline_id');
    }

    public function typeOfWork()
    {
        return $this->belongsTo(\App\Models\Typeofwork::class, 'typeofwork_id');
    }
    public function wordPage()
    {
        return $this->belongsTo(\App\Models\Wordpage::class, 'wordpage_id');
    }
    public function userLevel()
    {
        return $this->belongsTo(\App\Models\Userslevel::class, 'userslevel_id');
    }
    public function deadline()
    {
        return $this->belongsTo(\App\Models\Deadline::class, 'deadline_id');
    }
    public function subject()
    {
        return $this->belongsTo(\App\Models\Subject::class, 'subject_id');
    }
    public function extratService()
    {
        if(!is_null($this->extratservice_id) && $this->extratservice_id != ''){
            $es_id = explode(';', $this->extratservice_id);
            return \App\Models\Extratservice::whereIn('id', $es_id)->get();
        }
        return null;
    }
    public function hasExtratService($id)
    {
        if(!is_null($this->extratservice_id) && $this->extratservice_id != ''){
            $es_id = explode(';', $this->extratservice_id);
            return in_array($id, $es_id);
        }
        return false;
    }
    public function bonReduction()
    {
        return $this->belongsTo(\App\Models\Bonreduction::class, 'bonreduction_id');
    }

    public function typeOfPaper()
    {
        return $this->belongsTo(\App\Models\Typepaper::class, 'typepapers_id');
    }


    public function etat()
    {
        if($this->etat == "BIDDING")
            return $this->getDefaultState();
        else
            return strtoupper($this->etat);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function files()
    {
        return $this->hasMany(\App\Models\File::class, 'order_id');
    }









    public function calculerMontant(){

        $price = 0;

        if(!$this->is_premium)
            $price = $this->academicDeadline->prix_standard;
        else
            $price = $this->academicDeadline->prix_premium;

        if($this->typeOfWork->appliquer_prixfixe == 1){
            $price = $price + $this->typeOfWork->prix_fixe;
        }else{
            $price = $price + ($price * $this->typeOfWork->prix_percent) / 100;
        }

        $price = ($price + (($price * $this->wordPage->percentage_price) / 100)) * $this->number_of_page;

        /*
        if($this->userLevel->appliquer_prixfixe == 1){
            $price = $price + $this->userLevel->prix_fixe;
        }else{
            $price = $price + ($price * $this->userLevel->prix_percent) / 100;
        }
        */
        $ess = $this->extratService();
        if(!is_null($ess)){

            foreach($ess as $es){
                if($es->appliquer_prixfixe == 1){
                    $price = $price + $es->prix_fixe;
                }else{
                    $price = $price + ($price * $es->prix_percent) / 100;
                }
            }
        }



        if(!is_null($this->bonReduction) && $this->bonReduction->nb_user_max > $this->bonReduction->nb_user_utiliser) {

            if ($this->bonReduction->applique_prixfixe == 1) {
                if ($price > $this->bonReduction->min_spent) {
                    $price = $price - $this->bonReduction->prix_fixe;
                }
            }else{
                $discount = ($price * $this->bonReduction->prix_percent) / 100;
                if($this->bonReduction->max_discount < $discount)
                    $discount = $this->bonReduction->max_discount;
                $price = $price - $discount;

            }


            $this->bonReduction->nb_user_utiliser += 1;
            $this->bonReduction->save();
        }else{
        }

        $this->montant = floatval(number_format((float)$price, 2, '.', ''));


    }

    
}
