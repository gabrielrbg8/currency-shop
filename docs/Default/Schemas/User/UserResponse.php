<?php

namespace Docs\Default\Schemas\User;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class UserResponse
{
    /**
     * @OA\Property()
     */
    public int $id;

    /**
     * @OA\Property()
     */
    public string $name;

    /**
     * @OA\Property()
     */
    public string $email;

    /**
     * @OA\Property()
     */
    public ?string $token;
}
