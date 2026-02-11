<?php

declare(strict_types= 1);

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Application\User\ListUser\ListUserHandler;
use App\Application\User\ListUser\ListUserQuery;
use Illuminate\Http\JsonResponse;

final class ListUserController
{
    public function __construct(
        private ListUserHandler $handler
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $query = new ListUserQuery(
            page: (int) $request->query('page'),
            perPage: (int) $request->query('per_page'),
        );

        $responseDto = $this->handler->handle($query);

        return response()->json(
            $responseDto->toArray()
        );
    }
}