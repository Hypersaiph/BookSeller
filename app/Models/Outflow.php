<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outflow extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'book_type_id', 'sale_id', 'quantity', 'selling_price'
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function sale(){
        return $this->belongsTo('App\Models\Sale','sale_id');
    }
    public function book_type(){
        return $this->belongsTo('App\Models\BookType','book_type_id');
    }
}
