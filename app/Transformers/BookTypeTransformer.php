<?php

namespace App\Transformers;

use App\Models\BookType;
use League\Fractal\TransformerAbstract;

class BookTypeTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'publishers','book'
    ];
    public function transform(BookType $book_type){
        return [
            'book_type_id' => $book_type->id,
            'type_id' => $book_type->type->id,//tapa dura, tapa suave o audiolibro
            'type' => $book_type->type->type,
            'price' => $book_type->price,
            'pages' => $book_type->pages,
            'isbn10' => $book_type->isbn10,
            'isbn13' => $book_type->isbn13,
            'serial_cd' => $book_type->serial_cd,
            'duration' => $book_type->duration,
            'weight' => $book_type->weight,
            'width' => $book_type->width,
            'height' => $book_type->height,
            'depth' => $book_type->depth,
        ];
    }
    public function includePublishers(BookType $book_type)
    {
        return $this->collection($book_type->publishers, new PublisherTransformer);
    }
    public function includeBook(BookType $book_type){
        return $this->item($book_type->book, new BookTransformer());
    }
}