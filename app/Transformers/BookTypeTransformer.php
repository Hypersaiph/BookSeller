<?php

namespace App\Transformers;

use App\Models\BookType;
use League\Fractal\TransformerAbstract;

class BookTypeTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'publishers'
    ];
    public function transform(BookType $book_type){
        return [
            'type_id' => $book_type->type->id,
            'type' => $book_type->type->type,
            'price' => $book_type->title,
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
}