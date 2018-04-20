<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'sale_id', 'code', 'amount', 'penalty', 'payment_date', 'is_active'
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function sale(){
        return $this->belongsTo('App\Models\Sale','sale_id');
    }
}
