<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
        'name',
    ];
    public function book_types(){
        return $this->belongsToMany('App\Models\BookType');
    }
}
