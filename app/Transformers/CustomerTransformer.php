<?php

namespace App\Transformers;

use App\Models\Customer;
use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{
    protected $availableIncludes = [

    ];
    public function transform(Customer $customer){
        return [
            'customer_id' => $customer->id,
            'created_by' => $customer->created_by,
            'name' => $customer->name,
            'surname' => $customer->surname,
            'nit' => $customer->nit,
            'email' => $customer->email,
            'address' => $customer->address,
            'phone' => $customer->phone,
            'latitude' => $customer->latitude,
            'longitude' => $customer->longitude,
            'note' => $customer->note
        ];
    }
}