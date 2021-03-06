<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;

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
    public function roles(){
        //modelo - tabla - mi ID en esa tabla - la ID del otro modelo
        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }
    public function news(){
        return $this->hasMany('App\Models\News');
    }
    public function user_settings(){
        return $this->hasMany('App\Models\UserSettings');
    }
    public function sales(){
        return $this->hasMany('App\Models\Sale');
    }
}
