<?php

namespace App\Application\User\DTO;

class UserListResponseDTO
{
    public function __construct(
        public array $users
    ) {}

    public function toArray(): array
    {
        return array_map(
            fn (UserResponseDTO $user) => $user->toArray(), 
            $this->users
        );
    }
}