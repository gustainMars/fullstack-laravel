<?php

declare(strict_types= 1);

namespace App\Application\User\ListUser;

use App\Application\User\DTO\UserListResponseDTO;
use App\Domain\User\Repository\UserRepository;

final class ListUserHandler
{
    public function __construct(
        private UserRepository $repository
    ) {}

    public function handle(ListUserQuery $query): UserListResponseDTO
    {
        $result = $this->repository->paginate(
            $query->page,
            $query->perPage
        );

        return UserListResponseDTO::fromResult($result);
    }
}