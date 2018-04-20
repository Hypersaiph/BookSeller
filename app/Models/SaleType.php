<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleType extends Model
{
    protected $table = 'sale_types';
    protected $dates = ['created_at','updated_at'];
    public function sales(){
        return $this->hasMany('App\Models\Sale');
    }
}
