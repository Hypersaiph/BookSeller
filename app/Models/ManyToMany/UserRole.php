<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;
    protected $table = 'user_roles';
    protected $fillable = [
        'role_id',
        'user_id',
    ];
}
