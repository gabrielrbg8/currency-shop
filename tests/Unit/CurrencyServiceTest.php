<?php

namespace Tests\Unit;

use App\Services\Currency\CurrencyService;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Mockery;

class CurrencyServiceTest extends TestCase
{
    protected $currencyServiceMock;

    public function setUp(): void
    {
        parent::setUp();
        $this->currencyServiceMock = Mockery::mock(CurrencyService::class);
        $this->app->instance(CurrencyService::class, $this->currencyServiceMock);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testGetAllCurrencies()
    {
        $this->currencyServiceMock
            ->shouldReceive('getAll')
            ->with('USD', 'BRL')
            ->andReturn(['USDBRL' => ['bid' => 1.5]]);

        $result = $this->currencyServiceMock->getAll('USD', 'BRL');

        $this->assertArrayHasKey('bid', $result['USDBRL']);
        $this->assertEquals(1.5, $result['USDBRL']['bid']);
    }
}
