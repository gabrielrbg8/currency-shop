<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from_currency' => 'required|string|in:BRL',
            'to_currency' => 'required|string',
            'amount' => 'required|numeric|min:0.01',
        ];
    }
}
