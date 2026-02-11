<?php

declare(strict_types= 1);

namespace App\Application\User\DTO;
use App\Application\Shared\Pagination\PaginatedResult;

class UserListResponseDTO
{
    public function __construct(
        public array $data,
        public int $total,
        public int $page,
        public int $perPage,
    ) {}

    public static function fromResult(PaginatedResult $result): self
    {
        return new self(
            data: array_map(
                fn ($user) => UserResponseDTO::fromEntity($user)->toArray(),
                $result->items
            ),
            total: $result->total,
            page: $result->page,
            perPage: $result->perPage
        );
    }

    public function toArray(): array
    {
        return [
            'data' => $this->data,
            'meta' => [
                'total'    => $this->total,
                'page'     => $this->page,
                'per_page' => $this->perPage,
            ]
        ];
    }
}