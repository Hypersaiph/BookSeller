<?php

namespace App\Transformers;

use App\Models\Book;
use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'authors','genres','types'
    ];
    public function transform(Book $book){
        return [
            'language' => $book->language->language,
            'title' => $book->title,
            'description' => $book->description,
            'book_id' => $book->id,
            'edition' => $book->edition,
            'publication_date' => $book->publication_date,
            'cover_image' => $book->cover_image,
        ];
    }
    public function includeAuthors(Book $book)
    {
        return $this->collection($book->authors, new AuthorTransformer);
    }
    public function includeGenres(Book $book)
    {
        return $this->collection($book->genres, new GenreTransformer);
    }
    public function includeTypes(Book $book)
    {
        return $this->collection($book->book_types, new BookTypeTransformer);
    }
}