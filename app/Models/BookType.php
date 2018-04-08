<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookType extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $table = 'book_types';
    protected $fillable = [
        'book_id', 'type_id', 'price', 'pages', 'isbn10', 'isbn13','serial_cd', 'duration', 'weight', 'width', 'height', 'depth'
    ];
    protected $dates = ['created_at','updated_at','deleted_at'];
    public function book(){
        return $this->belongsTo('App\Models\Book', 'book_id');
    }
    public function type(){
        return $this->belongsTo('App\Models\Type', 'type_id');
    }
    public function publishers(){
        return $this->belongsToMany('App\Models\Publisher', 'book_publishers', 'book_type_id', 'publisher_id');
    }
}
