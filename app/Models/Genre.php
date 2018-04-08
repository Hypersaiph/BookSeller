<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Genre extends Model
{
    use Notifiable;
    protected $dates = ['created_at','updated_at'];
    public function books(){
        return $this->belongsToMany('App\Models\Book');
    }
}
