<?php

namespace App\Services\User;

use App\Models\User\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function store(array $data): User
    {
        return $this->userRepository->create($data);
    }
}
