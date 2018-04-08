<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model
{
    public $timestamps = false;
    protected $table = 'book_genres';
    protected $fillable = [
        'book_id',
        'genre_id',
    ];
}
