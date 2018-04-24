<?php

namespace App\Transformers;

use App\Models\Sale;
use League\Fractal\TransformerAbstract;

class SaleTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'accounts','outflows','customer'
    ];
    public function transform(Sale $sale){
        return [
            'sale_id' => $sale->id,
            'code' => $sale->code,
            'is_billed' => $sale->is_billed,
            'months' => $sale->months,
            'anual_interest' => $sale->anual_interest,
            'sale_type' => $sale->sale_type->type,
            'sale_type_id' => $sale->sale_type->id,
        ];
    }
    public function includeAccounts(Sale $sale)
    {
        return $this->collection($sale->accounts, new AccountTransformer);
    }
    public function includeOutflows(Sale $sale)
    {
        return $this->collection($sale->outflows, new OutflowTransformer);
    }
    public function includeCustomer(Sale $sale)
    {
        return $this->item($sale->customer, new CustomerTransformer);
    }
}