<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    protected $table = 'user_settings';
    protected $fillable = [
        'user_id', 'key', 'value'
    ];
    protected $dates = ['created_at','updated_at'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
