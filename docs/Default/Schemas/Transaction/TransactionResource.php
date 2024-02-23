<?php

namespace Docs\Default\Schemas\Transaction;

use Docs\Default\Schemas\Links;
use Docs\Default\Schemas\Meta;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class TransactionResource
{
    /**
     * @OA\Property()
     */
    public TransactionResponse $data;

    /**
     * @OA\Property(example="integer")
     */
    public int $statusCode;

        /**
     * @OA\Property(
     *     title="Meta Information",
     *     ref="#/components/schemas/Meta"
     * )
     */
    public Meta $meta;

    /**
     * @OA\Property(
     *     title="Links",
     *     ref="#/components/schemas/Links"
     * )
     */
    public Links $links;
}
