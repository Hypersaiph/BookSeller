<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_id', 'user_id', 'sale_type_id', 'code', 'is_billed', 'months', 'anual_interest'
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
    public function sale_type(){
        return $this->belongsTo('App\Models\SaleType','sale_type_id');
    }
    public function book_types(){
        return $this->belongsToMany('App\Models\BookType', 'outflows', 'sale_id', 'book_type_id');
    }
    public function accounts(){
        return $this->hasMany('App\Models\Account');
    }
    public function outflows(){
        return $this->hasMany('App\Models\Outflow');
    }
}
