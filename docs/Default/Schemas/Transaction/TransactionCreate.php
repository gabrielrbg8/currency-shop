<?php

namespace Docs\Default\Schemas\Transaction;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="TransactionCreate",
 *     description="Transaction creation request body",
 *     @OA\Xml(
 *         name="TransactionCreate"
 *     )
 * )
 */
class TransactionCreate
{
    /**
     * @OA\Property(
     *     title="To Currency",
     *     description="Currency to convert to",
     * )
     */
    public string $to_currency;

    /**
     * @OA\Property(
     *     title="Amount",
     *     description="Amount to convert",
     * )
     */
    public float $amount;
}
