<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Type extends Model
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function books(){
        return $this->belongsToMany('App\Models\Book');
    }
}
