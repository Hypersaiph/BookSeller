<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    public $timestamps = false;
    protected $table = 'book_authors';
    protected $fillable = [
        'book_id',
        'author_id',
    ];
}
