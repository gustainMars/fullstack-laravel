<?php

declare(strict_types=1);

namespace Tests\Unit\Application\User;

use App\Domain\User\Validation\UserValidationMessage;
use PHPUnit\Framework\TestCase;
use App\Application\User\CreateUser\CreateUserInput;
use App\Application\User\CreateUser\CreateUserUseCase;
use Tests\Fake\InMemoryUserRepository;

final class CreateUserUseCaseTest extends TestCase
{
    public function test_it_creates_a_user_successfully(): void
    {
        $repository = new InMemoryUserRepository();
        $useCase = new CreateUserUseCase($repository);
        
        $name = 'John Doe';
        $email = 'john@email.com';
        $input = new CreateUserInput(
            name: $name,
            email: $email
        );

        $output = $useCase->execute($input);

        $this->assertNotEmpty($output->id);
        $this->assertSame($name, $output->name);
        $this->assertSame($email, $output->email);
    }

    public function test_it_does_not_allow_duplicate_emails(): void
    {
        $repository = new InMemoryUserRepository();
        $useCase = new CreateUserUseCase($repository);
        
        $input = new CreateUserInput(
            name: 'John Doe',
            email: 'duplicate@email.com'
        );

        $useCase->execute($input);
        
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage(UserValidationMessage::EMAIL_ALREADY_EXISTS->value);

        $useCase->execute($input);
    }
}