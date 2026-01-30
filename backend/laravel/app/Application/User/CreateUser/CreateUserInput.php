<?php

declare(strict_types=1);

namespace App\Application\User\CreateUser;

final class CreateUserInput
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) {
    }
}