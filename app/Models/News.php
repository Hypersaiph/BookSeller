<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $table = 'news';
    protected $fillable = [
        'user_id', 'title', 'message', 'delivery_date', 'delivery_time',
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
