<?php

declare(strict_types= 1);

namespace App\Http\Controllers\User;

use App\Application\User\ListUser\ListUserHandler;
use Illuminate\Http\JsonResponse;

final class ListUserController
{
    public function __construct(
        private ListUserHandler $handler
    ) {}

    public function __invoke(): JsonResponse
    {
        return response()->json(
            $this->handler->handle()
        );
    }
}