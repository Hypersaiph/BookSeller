<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    public $timestamps = false;
    protected $table = 'book_images';
    protected $fillable = [
        'book_id',
        'image_id',
    ];
}
