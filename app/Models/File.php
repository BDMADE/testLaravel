<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class File
 * @package App\Models
 * @version January 3, 2018, 8:33 pm UTC
 *
 * @property integer order_id
 * @property string nom
 * @property string type
 * @property string emplacement
 */
class File extends Model
{
    use SoftDeletes;

    public $table = 'files';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'order_id',
        'user_id',
        'admin_id',
        'is_user_sender',
        'nom',
        'physical_name',
        'type',
        'emplacement'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'admin_id' => 'integer',
        'is_user_sender' => 'boolean',
        'order_id' => 'integer',
        'nom' => 'string',
        'physical_name' => 'string',
        'type' => 'string',
        'emplacement' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
    public function admin()
    {
        return $this->belongsTo(\App\Models\User::class, 'admin_id');
    }
    public function iAmSender($user_id)
    {
        return ($this->user_id == $user_id && $this->is_user_sender) || ($this->admin_id == $user_id && !$this->is_user_sender);
    }

    
}
