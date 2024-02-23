<?php

namespace Docs\Default\Schemas\Transaction;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Transaction",
 *     description="Transaction resource representation",
 *     @OA\Xml(
 *         name="Transaction"
 *     )
 * )
 */
class TransactionResponse
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="Transaction ID",
     *     format="int64"
     * )
     */
    public int $id;

    /**
     * @OA\Property(
     *     title="User ID",
     *     description="User ID associated with the Transaction",
     *     format="int64"
     * )
     */
    public int $user_id;

    /**
     * @OA\Property(
     *     title="From Currency",
     *     description="Currency to convert from",
     * )
     */
    public string $from_currency;

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

    /**
     * @OA\Property(
     *     title="Service Fee",
     *     description="Service fee applied",
     * )
     */
    public float $service_fee;

    /**
     * @OA\Property(
     *     title="Total Amount",
     *     description="Total amount after conversion",
     * )
     */
    public float $total_amount;

    /**
     * @OA\Property(
     *     title="Created At",
     *     description="Transaction creation timestamp",
     *     example="2024-02-23 22:08:55"
     * )
     */
    public string $created_at;

    /**
     * @OA\Property(
     *     title="Updated At",
     *     description="Transaction update timestamp",
     *     example="2024-02-23 22:08:55"
     * )
     */
    public string $updated_at;
}
