<?php

declare(strict_types=1);

namespace App\Application\User\CreateUser;

use App\Domain\User\Entity\User;
use App\Domain\User\Exception\UserAlreadyExistsException;
use App\Domain\User\Repository\UserRepository;
use App\Domain\Shared\ValueObject\Email;
use Ramsey\Uuid\Uuid;

final class CreateUserUseCase
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    public function execute(CreateUserInput $input): CreateUserOutput
    {
        $email = new Email($input->email);

        $existingUser = $this->userRepository->findByEmail($email->value());

        if ($existingUser !== null) {
            throw new UserAlreadyExistsException();
        }

        $user = new User(
            id: Uuid::uuid4()->toString(),
            name: $input->name,
            email: $email
        );

        $this->userRepository->save($user);

        return new CreateUserOutput(
            id: $user->id(),
            name: $user->name(),
            email: $user->email()->value()
        );
    }    
}