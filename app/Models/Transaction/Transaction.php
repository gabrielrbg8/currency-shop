<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Transaction.
 *
 * @package namespace App\Models\Transaction;
 */
class Transaction extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'from_currency',
        'to_currency',
        'amount',
        'exchange_rate',
        'service_fee',
        'total_amount',
    ];

}
