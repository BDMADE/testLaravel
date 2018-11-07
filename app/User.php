<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'role_id',
        'pay_id',
        'login',
        'name',
        'email',
        'avatar',
        'tel1',
        'tel2',
        'sexe',
        'remember_token',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'role_id' => 'integer',
        'pay_id' => 'integer',
        'login' => 'string',
        'name' => 'string',
        'email' => 'string',
        'avatar' => 'string',
        'tel1' => 'string',
        'tel2' => 'string',
        'sexe' => 'string',
        'remember_token' => 'string',
        'password' => 'string'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }

    public function isClient(){
        return $this->role->slug == 'client';
    }
    public function isAdmin(){
        return $this->role->slug != 'client';
    }
    public function isSuperAdmin(){
        return $this->role->slug != 'superadmin';
    }



    public function pay()
    {
        return $this->belongsTo(\App\Models\Pay::class, 'pay_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function files()
    {
        return $this->hasMany(\App\Models\File::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function filesWithUser($user_id)
    {
        return \App\Models\File::where('user_id', $user_id)->get();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'user_id')->orderBy('created_at', 'desc');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function historique()
    {
        return $this->hasMany(\App\Models\Historique::class, 'user_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function messages()
    {
        return $this->hasMany(\App\Models\Message::class, 'user_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function messagesNotRead()
    {
        $msg = \App\Models\Message::where('user_id', $this->id)->whereNotNull('admin_id')->orderBy('id', 'desc')->first();
        if($msg){
            return \App\Models\Message::where('id', '>', $msg->id)->get();
        }
        return null;

    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function messagesAllAdmin()
    {
        return \App\Models\Message::where('id', '>', 0)->orderBy('id', 'desc')->take(20)->get();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userAllAdmin()
    {
        return \App\Models\User::where('id', '>', 0)->orderBy('id', 'desc')->get();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function solde()
    {
        return $this->hasMany(\App\Models\Solde::class, 'user_id');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nb_activeOrders()
    {
        $nb = \App\Models\Order::where('active', 1)->count();
        /*$nb = 0;
        foreach($this->orders as $ord){
            $nb += ($ord->active == true) ? 1 : 0;
        }*/

        return $nb;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nb_biddingOrders()
    {
        $nb = \App\Models\Order::where('etat', 'BIDDING')->where('user_id', $this->id)->count();

        /*$nb = 0;
        foreach($this->orders as $ord){
            $nb += ($ord->etat == "BIDDING") ? 1 : 0;
        }*/

        return $nb;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nb_progressOrders()
    {
        $nb = \App\Models\Order::where('etat', 'IN PROGRESS')->where('user_id', $this->id)->count();

        /*$nb = 0;
        foreach($this->orders as $ord){
            $nb += ($ord->etat == "IN PROGRESS") ? 1 : 0;
        }*/

        return $nb;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nb_completeOrders()
    {
        $nb = \App\Models\Order::where('etat', 'COMPLETED')->where('user_id', $this->id)->count();

        /*$nb = 0;
        foreach($this->orders as $ord){
            $nb += ($ord->etat == "COMPLETED") ? 1 : 0;
        }*/

        return $nb;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nb_activeOrdersAdmin()
    {
        return \App\Models\Order::where('active', 1)->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nb_biddingOrdersAdmin()
    {
        return \App\Models\Order::where('etat', 'BIDDING')->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nb_progressOrdersAdmin()
    {
        return \App\Models\Order::where('etat', 'IN PROGRESS')->count();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nb_completeOrdersAdmin()
    {
        return \App\Models\Order::where('etat', 'COMPLETED')->count();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function amountInWaitAdmin()
    {
        return \App\Models\Solde::where('id', '>', 0)->sum('montant_utile');
    }




}
