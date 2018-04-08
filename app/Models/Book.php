<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'language_id', 'title', 'description', 'edition', 'publication_date', 'cover_image',
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function types(){
        //modelo - tabla - mi ID en esa tabla - la ID del otro modelo
        return $this->belongsToMany('App\Models\Type', 'book_types', 'book_id', 'type_id');
    }
    public function genres(){
        //modelo - tabla - mi ID en esa tabla - la ID del otro modelo
        return $this->belongsToMany('App\Models\Genre', 'book_genres', 'book_id', 'genre_id');
    }
    public function authors(){
        return $this->belongsToMany('App\Models\Author', 'book_authors', 'book_id', 'author_id');
    }
    public function images(){
        return $this->belongsToMany('App\Models\Image', 'book_images', 'book_id', 'image_id');
    }
    public function book_types(){
        return $this->hasMany('App\Models\BookType');
    }
    public function language(){
        return $this->belongsTo('App\Models\Language', 'language_id');
    }
}
