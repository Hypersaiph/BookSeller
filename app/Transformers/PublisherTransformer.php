<?php

namespace App\Transformers;

use App\Models\Publisher;
use League\Fractal\TransformerAbstract;

class PublisherTransformer extends TransformerAbstract
{
    public function transform(Publisher $publisher)
    {
        return [
            'publisher' => $publisher->name,
        ];
    }
}