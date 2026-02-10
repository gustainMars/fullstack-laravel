<?php

declare(strict_types=1);

namespace App\Infraestructure\Persistence\Eloquent\User;

use App\Domain\User\Entity\User;
Use App\Domain\User\Repository\UserRepository;
use App\Domain\Shared\ValueObject\Email;

final class EloquentUserRepository implements UserRepository
{
    public function save(User $user): void
    {
        UserModel::updateOrCreate(
            ['id' => $user->id()],
            [
                'name' => $user->name(),
                'email' => $user->email()->value(),
            ]
        );
    }

    public function findByEmail(string $email): ?User
    {
        $model = UserModel::where('email', $email)->first();

        if ($model === null) {
            return null;
        }
        
        return new User(
            $model->id,
            $model->name,
            new Email($model->email)
        );
    }

    public function all(): array
    {
        return UserModel::all()
            ->map(fn ($model) => new User(
                id: $model->id,
                name: $model->name,
                email: new Email($model->email)
            ))
            ->all();
    }
}