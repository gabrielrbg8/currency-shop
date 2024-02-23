<?php

namespace Docs\Default\Schemas;

/**
 * @OA\Schema(
 *     title="Meta",
 *     description="Meta information for list endpoints",
 *     @OA\Xml(
 *         name="Meta"
 *     )
 * )
 */
class Meta
{
    /**
     * @OA\Property(
     *     title="Current Page",
     *     example=1
     * )
     */
    public int $current_page;

    /**
     * @OA\Property(
     *     title="Items Per Page",
     *     example=30
     * )
     */
    public int $per_page;

    /**
     * @OA\Property(
     *     title="Total Items",
     *     example=0
     * )
     */
    public int $total;

    /**
     * @OA\Property(
     *     title="Total Pages",
     *     example=1
     * )
     */
    public int $total_pages;
}
