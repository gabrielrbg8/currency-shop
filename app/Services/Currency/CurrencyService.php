<?php

namespace App\Services\Currency;

use GuzzleHttp\Client;

class CurrencyService
{
    public function __construct(private Client $client)
    {
    }

    public function getAll(string $fromCurrency, string $toCurrency): array
    {
        $response = $this->client->get('https://economia.awesomeapi.com.br/json/last/' . $toCurrency . '-' . $fromCurrency);
        return json_decode($response->getBody(), true);
    }
}
