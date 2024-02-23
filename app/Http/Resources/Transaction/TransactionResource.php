<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'from_currency' => $this->from_currency,
            'to_currency' => $this->to_currency,
            'amount' => $this->amount,
            'service_fee' => $this->service_fee,
            'total_amount' => $this->total_amount,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
