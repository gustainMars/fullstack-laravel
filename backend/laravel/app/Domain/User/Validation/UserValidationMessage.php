<?php

declare(strict_types= 1);

namespace App\Domain\User\Validation;

enum UserValidationMessage: string
{
    case EMAIL_ALREADY_EXISTS = 'An user with this email already exists.';
}