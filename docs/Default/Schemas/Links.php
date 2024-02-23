<?php

namespace Docs\Default\Schemas;

/**
 * @OA\Schema(
 *     title="Links",
 *     description="Links for list endpoints",
 *     @OA\Xml(
 *         name="Links"
 *     )
 * )
 */
class Links
{
    /**
     * @OA\Property(
     *     title="First Page URL",
     *     example="http://localhost:8989/api/transactions?filter%5Bfrom_currency%5D=XXT&page%5Bnumber%5D=1"
     * )
     */
    public string $first;

    /**
     * @OA\Property(
     *     title="Last Page URL",
     *     example="http://localhost:8989/api/transactions?filter%5Bfrom_currency%5D=XXT&page%5Bnumber%5D=1"
     * )
     */
    public string $last;

    /**
     * @OA\Property(
     *     title="Previous Page URL",
     *     example=null
     * )
     */
    public ?string $prev;

    /**
     * @OA\Property(
     *     title="Next Page URL",
     *     example=null
     * )
     */
    public ?string $next;
}
