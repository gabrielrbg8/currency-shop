<?php

namespace App\Http\Controllers\Currency;


use App\Services\Currency\CurrencyService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrencyController extends Controller
{
    public function __construct(private CurrencyService $currencyService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $fromCurrency, $toCurrency)
    {
        return response()->json($this->currencyService->getAll($fromCurrency, $toCurrency), Response::HTTP_OK);
    }
}
