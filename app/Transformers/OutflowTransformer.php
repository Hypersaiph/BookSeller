<?php

namespace App\Transformers;

use App\Models\Outflow;
use League\Fractal\TransformerAbstract;

class OutflowTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'type'
    ];
    public function transform(Outflow $outflow){
        return [
            'quantity' => $outflow->quantity,
            'selling_price' => $outflow->selling_price,
        ];
    }
    public function includeType(Outflow $outflow)
    {
        return $this->item($outflow->book_type, new BookTypeTransformer);
    }
}