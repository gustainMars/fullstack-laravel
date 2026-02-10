<?php

declare(strict_types= 1);

namespace App\Application\User\ListUser;

use App\Application\User\DTO\UserListResponseDTO;
use App\Application\User\DTO\UserResponseDTO;
use App\Domain\User\Repository\UserRepository;

final class ListUserHandler
{
    public function __construct(
        private UserRepository $repository
    ) {}

    public function handle(): UserListResponseDTO
    {
        $users = $this->repository->all();

        return new UserListResponseDTO(
            array_map(
                fn($user) => UserResponseDTO::fromEntity($user),
                $users
            )
        );
    }
}