<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $fillable = [
        'image_type_id',
        'name',
        'big_text',
        'small_text',
    ];
    public function users(){
        return $this->belongsToMany('App\Models\Book');
    }
    public function image_type(){
        return $this->belongsTo('App\Models\ImageType', 'image_type_id');
    }
}
