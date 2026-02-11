<?php

declare(strict_types= 1);

namespace App\Application\Shared\Pagination;

class PaginatedResult
{
    public function __construct(
        public array $items,
        public int $total,
        public int $page,
        public int $perPage,
    ) {}
}