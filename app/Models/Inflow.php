<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inflow extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'book_type_id', 'quantity'
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function book_type(){
        return $this->belongsTo('App\Models\BookType','book_type_id');
    }
}
