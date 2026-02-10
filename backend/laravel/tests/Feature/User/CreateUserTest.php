<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_user(): void
    {
        $email = 'john@example.com';
        $response = $this->postJson('/api/users', [
            'name' => 'John Doe',
            'email' => $email,
        ]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
            ]);

        $this->assertDatabaseHas('users', [
            'email' => $email,
        ]);
    }
}