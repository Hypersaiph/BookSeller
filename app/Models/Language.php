<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $dates = ['created_at','updated_at'];
    public function books(){
        return $this->hasMany('App\Models\Book');
    }
}
