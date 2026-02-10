<?php

namespace App\Application\User\DTO;

use App\Domain\User\Entity\User;

class UserResponseDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
    ) {}

    public static function fromEntity(User $user): self
    {
        return new self(
            id: $user->id(),
            name: $user->name(),
            email: $user->email()->value()
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}