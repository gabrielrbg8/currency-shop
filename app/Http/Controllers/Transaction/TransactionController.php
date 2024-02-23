<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Requests\Transaction\TransactionStoreRequest;
use App\Models\Transaction\Transaction;
use App\Services\Transaction\TransactionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    public function __construct(private TransactionService $transactionService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->showAll($this->transactionService->getAll($request->user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TransactionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionStoreRequest $request)
    {
        return $this->showOne($this->transactionService->store($request->validated(), $request->user()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return $this->showOne($transaction);
    }
}
