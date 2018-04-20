<?php

namespace App\Transformers;

use App\Models\Genre;
use League\Fractal\TransformerAbstract;

class GenreTransformer extends TransformerAbstract
{
    public function transform(Genre $genre)
    {
        return [
            'genre' => $genre->genre,
        ];
    }
}