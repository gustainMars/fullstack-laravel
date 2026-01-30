<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

use App\Domain\Shared\ValueObject\Email;

final class User
{
    private string $id;
    private string $name;
    private Email $email;

    public function __construct(
        string $id, 
        string $name, 
        Email $email
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): Email
    {
        return $this->email;
    }
}