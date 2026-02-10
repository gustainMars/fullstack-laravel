<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

class ListUsersTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_users(): void
    {
        $email = 'john@example.com';

        $this->postJson('/api/users', [
            'name'  => 'John Doe',
            'email' => $email,
        ]);

        $response = $this->getJson('/api/users');

        $response
            ->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment([
                'email' => $email,
            ]);
    }
}