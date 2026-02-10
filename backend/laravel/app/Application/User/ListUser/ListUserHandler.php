<?php

declare(strict_types= 1);

namespace App\Application\User\ListUser;

use App\Domain\User\Repository\UserRepository;

final class ListUserHandler
{
    public function __construct(
        private UserRepository $repository
    ) {}

    public function handle(): array
    {
        $users = $this->repository->all();

        return array_map(
            fn ($user) => new ListUserOutput(
                id: $user->id(),
                name: $user->name(),
                email: $user->email()->value(),
            ),
            $users
        );
    }
}