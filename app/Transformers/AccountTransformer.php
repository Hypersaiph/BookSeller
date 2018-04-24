<?php

namespace App\Transformers;

use App\Models\Account;
use League\Fractal\TransformerAbstract;

class AccountTransformer extends TransformerAbstract
{
    public function transform(Account $account){
        return [
            'account_id' => $account->id,
            'code' => $account->code,
            'amount' => $account->amount,
            'penalty' => $account->penalty,
            'payment_date' => $account->payment_date,
            'limit_payment_date' => $account->limit_payment_date,
            'is_active' => $account->is_active,
        ];
    }
}