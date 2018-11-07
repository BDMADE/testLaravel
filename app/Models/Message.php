<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 * @package App\Models
 * @version January 11, 2018, 12:17 pm UTC
 *
 * @property integer user_id
 * @property integer admin_id
 * @property boolean user_is_sender
 * @property string message
 */
class Message extends Model
{
    use SoftDeletes;

    public $table = 'messages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'admin_id',
        'user_is_sender',
        'message'
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
        'user_is_sender' => 'boolean',
        'message' => 'string'
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
    public function admin()
    {
        return $this->belongsTo(\App\Models\User::class, 'admin_id');
    }



    
}
