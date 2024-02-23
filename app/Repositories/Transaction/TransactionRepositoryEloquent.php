<?php

namespace App\Repositories\Transaction;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Transaction\TransactionRepository;
use App\Models\Transaction\Transaction;
use App\Models\User\User;
use App\Validators\Transaction\TransactionValidator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class TransactionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Transaction;
 */
class TransactionRepositoryEloquent extends BaseRepository implements TransactionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Transaction::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Return build Eloquent query
     *
     * @param \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|string $queryBuilder
     * @param User $user
     * @return LengthAwarePaginator
     */
    private function queryBuilder($queryBuilder, $user)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::exact('total_amount'),
                AllowedFilter::exact('amount'),
                AllowedFilter::exact('from_currency'),
                AllowedFilter::exact('to_currency'),
            ])->when($user, function (Builder $query, $user) {
                $query->where('user_id', $user->id);
            })->allowedSorts([
                    'created_at',
                ])->jsonPaginate();
    }

    public function getAll(User $user): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model(), $user);
    }
}
