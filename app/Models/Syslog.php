<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syslog extends Model
{
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'user_id', 'record_id', 'event', 'table', 'description'
    ];
}
