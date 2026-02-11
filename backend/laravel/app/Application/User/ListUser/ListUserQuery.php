<?php

declare(strict_types= 1);

namespace App\Application\User\ListUser;

class ListUserQuery
{
    public function __construct(
        public int $page = 1,
        public int $perPage = 10,
    ) {}
}