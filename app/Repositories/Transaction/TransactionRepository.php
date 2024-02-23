<?php

namespace App\Repositories\Transaction;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TransactionRepository.
 *
 * @package namespace App\Repositories\Transaction;
 */
interface TransactionRepository extends RepositoryInterface
{
    public function getAll(User $user): LengthAwarePaginator;
}
