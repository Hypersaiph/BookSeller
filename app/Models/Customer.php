<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'surname', 'nit','latitude','longitude'
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function purchases(){
        return $this->hasMany('App\Models\Sale');
    }
}
