<?php

declare(strict_types= 1);

namespace App\Http\Controllers\User;

use App\Application\User\CreateUser\CreateUserInput;
use App\Application\User\CreateUser\CreateUserUseCase;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CreateUserController
{
    public function __construct(
        private CreateUserUseCase $useCase
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $input = new CreateUserInput(
                name: (string) $request->input('name'),
                email: (string) $request->input('email'),
            );

            $output = $this->useCase->execute($input);
            
            return response()->json([
                'id' => $output->id,
                'name' => $output->name,
                'email' => $output->email,
            ], Response::HTTP_CREATED);
        } catch (\DomainException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], Response::HTTP_CONFLICT);
        }
    }
}
