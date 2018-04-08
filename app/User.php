<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];
    /*public function user_roles(){
        return $this->hasMany('App\Models\UserRole', 'user_id');
    }*/
    public function roles(){
        //modelo - tabla - mi ID en esa tabla - la ID del otro modelo
        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }
}
