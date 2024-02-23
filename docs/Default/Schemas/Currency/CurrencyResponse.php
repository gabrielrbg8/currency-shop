<?php

namespace Docs\Default\Schemas\Currency;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Currency",
 *     description="Currency resource representation",
 *     @OA\Xml(
 *         name="Currency"
 *     )
 * )
 */
class CurrencyResponse
{
    /**
     * @OA\Property(
     *     title="Currency Code",
     *     description="Currency code (e.g., USD)",
     * )
     */
    public string $code;

    /**
     * @OA\Property(
     *     title="Currency Codein",
     *     description="Currency codein (e.g., BRL)",
     * )
     */
    public string $codein;

    /**
     * @OA\Property(
     *     title="Currency Name",
     *     description="Currency name (e.g., Dólar Americano/Real Brasileiro)",
     * )
     */
    public string $name;

    /**
     * @OA\Property(
     *     title="High",
     *     description="Highest exchange rate",
     * )
     */
    public float $high;

    /**
     * @OA\Property(
     *     title="Low",
     *     description="Lowest exchange rate",
     * )
     */
    public float $low;

    /**
     * @OA\Property(
     *     title="Bid Variation",
     *     description="Bid variation",
     * )
     */
    public float $varBid;

    /**
     * @OA\Property(
     *     title="Percentage Change",
     *     description="Percentage change",
     * )
     */
    public float $pctChange;

    /**
     * @OA\Property(
     *     title="Bid",
     *     description="Bid price",
     * )
     */
    public float $bid;

    /**
     * @OA\Property(
     *     title="Ask",
     *     description="Ask price",
     * )
     */
    public float $ask;

    /**
     * @OA\Property(
     *     title="Timestamp",
     *     description="Currency timestamp",
     * )
     */
    public string $timestamp;

    /**
     * @OA\Property(
     *     title="Create Date",
     *     description="Currency creation date",
     * )
     */
    public string $create_date;
}
