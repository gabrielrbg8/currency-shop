<?php

namespace App\Services\Currency;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CurrencyService
{
    public function __construct(private Client $client)
    {
    }

    public function getAll(string $currency): array
    {
        try {
            $response = $this->client->get('https://economia.awesomeapi.com.br/json/last/' . $currency . '-BRL');
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            if ($e->getResponse() && $e->getResponse()->getStatusCode() == 404) {
                $responseData = json_decode($e->getResponse()->getBody(), true);
                if (isset($responseData['code']) && $responseData['code'] == 'CoinNotExists') {
                    throw new \App\Exceptions\CoinNotFoundException("Moed {$currency} não encontrada", 404);
                }
            } else {
                throw $e;
            }
        }
    }
}
