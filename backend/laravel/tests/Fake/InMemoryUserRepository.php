<?php

declare(strict_types=1);

namespace Tests\Fake;

use App\Domain\User\Entity\User;
use App\Domain\User\Repository\UserRepository;

final class InMemoryUserRepository implements UserRepository
{
    /** @var User[] */
    private array $users = [];

    public function save(User $user): void
    {
        $this->users[$user->id()] = $user;
    }

    public function findByEmail(string $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->email()->value() === $email) {
                return $user;
            }
        }

        return null;
    }

    public function all(): array
    {
        return $this->users;
    }
}