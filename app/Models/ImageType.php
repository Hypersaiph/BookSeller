<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageType extends Model
{
    protected $table = 'image_types';
    protected $dates = ['created_at','updated_at'];
    public function images(){
        return $this->hasMany('App\Models\Image');
    }
}
