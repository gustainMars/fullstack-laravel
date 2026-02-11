<?php

declare(strict_types=1);

namespace App\Domain\User\Repository;

use App\Application\Shared\Pagination\PaginatedResult;
use App\Domain\User\Entity\User;

interface UserRepository
{
    public function save(User $user): void;

    public function findByEmail(string $email): ?User;

    public function all(): array;

    public function paginate(int $page, int $perPage): PaginatedResult;
}