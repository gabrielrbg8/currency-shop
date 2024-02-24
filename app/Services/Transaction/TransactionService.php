<?php

namespace App\Services\Transaction;

use App\Enums\FeeEnum;
use App\Exceptions\MinimumPurchaseException;
use App\Models\Transaction\Transaction;
use App\Models\User\User;
use App\Repositories\Transaction\TransactionRepository;
use App\Services\Currency\CurrencyService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TransactionService
{
    public function __construct(private TransactionRepository $transactionRepository, private CurrencyService $currencyService)
    {
    }

    /**
     * Get all registers
     * 
     * @return LengthAwarePaginator
     */
    public function getAll(User $user)
    {
        return $this->transactionRepository->getAll($user);
    }

    /**
     * Store a new Transaction resource
     * 
     * @param array $data
     * @return Transaction
     */
    public function store(array $data, User $user)
    {
        $currencyInfo = $this->currencyService->getAll($data['to_currency']);
        $bid = $currencyInfo[strtoupper($data['to_currency'] . 'BRL')]['bid'];
        $totalAmount = $this->calculateTotalAmount($data['amount'], $bid);

        $serviceFee = $this->calculateServiceFee($totalAmount);

        $totalAmountWithFee = $totalAmount + $serviceFee;

        $this->validateMinimumPurchaseAmount($totalAmountWithFee);

        return $this->transactionRepository->create(array_merge($data, ['from_currency' => 'BLR', 'exchange_rate' => $bid, 'user_id' => $user->id, 'service_fee' => $serviceFee, 'total_amount' => $totalAmountWithFee]));
    }

    public function calculateTotalAmount(float $amount, float $bid): float
    {
        return $amount * $bid;
    }

    public function calculateServiceFee(float $totalAmount): float
    {
        return FeeEnum::STANDARD_FEE * $totalAmount;
    }

    public function validateMinimumPurchaseAmount(float $totalAmount): void
    {
        if ($totalAmount < 50) {
            throw new MinimumPurchaseException('The total amount must be at least BRL50.');
        }
    }
}
