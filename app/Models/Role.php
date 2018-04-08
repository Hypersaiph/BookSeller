<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'name',
        'description'
    ];
    /*public function user_roles(){
        return $this->hasMany('App\Models\UserRole', 'role_id');
    }*/
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
