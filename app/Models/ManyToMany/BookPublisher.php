<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Model;

class BookPublisher extends Model
{
    public $timestamps = false;
    protected $table = 'book_publishers';
    protected $fillable = [
        'book_type_id',
        'publisher_id',
    ];
}
