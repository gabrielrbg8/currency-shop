<?php

namespace Tests\Unit\Services;

use App\Exceptions\MinimumPurchaseException;
use App\Services\Transaction\TransactionService;
use Illuminate\Support\Facades\App;
use Tests\TestCase;


class TransactionServiceTest extends TestCase
{
    /** @var TransactionService */
    private $transactionService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->transactionService = App::make(TransactionService::class);
    }

    public function testMinimumPurchaseAmountException()
    {
        $this->expectException(MinimumPurchaseException::class);
        $this->transactionService->validateMinimumPurchaseAmount(40);
    }

    public function testServiceFeeCalculation()
    {
        // Define um valor de compra (100 BRL)
        $amount = 100;

        // Obtém a resposta da API de cotação de moedas (um valor de "bid" de 4.994)
        $exchangeRateData = ['bid' => 4.994];

        // Extrai o valor do campo "bid" da resposta da API
        $bid = $exchangeRateData['bid'];

        // Calcular o totalAmount com base no montante e taxa de câmbio
        $totalAmount = $this->transactionService->calculateTotalAmount($amount, $bid);

        // Calcular a taxa de serviço (2% do totalAmount)
        $serviceFee = $this->transactionService->calculateServiceFee($totalAmount);

        // Verifica se a taxa de serviço é 2% do totalAmount
        $expectedServiceFee = 0.02 * $totalAmount;
        $this->assertEquals($expectedServiceFee, $serviceFee);
    }
}
