<?php

declare(strict_types= 1);

namespace App\Domain\User\Exception;

use App\Domain\User\Validation\UserValidationMessage;
use DomainException;

final class UserAlreadyExistsException extends DomainException
{
    public function __construct()
    {
        parent::__construct(
            UserValidationMessage::EMAIL_ALREADY_EXISTS->value
        );
    }
}