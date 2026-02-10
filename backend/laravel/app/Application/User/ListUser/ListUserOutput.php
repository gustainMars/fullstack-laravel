<?php

declare(strict_types= 1);

namespace App\Application\User\ListUser;

final class ListUserOutput
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $email,
    ) {}
}