<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
  public function testsRegistersSuccessfully()
  {
    $payload = [
      'name' => 'John',
      'email' => 'johnsmith@example.com',
      'password' => 'secret'
    ];

    $this->json('post', '/api/register', $payload)
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "name",
        "email",
        "updated_at",
        "created_at",
      ]
    ]);
  }

  public function testsRequiresPasswordEmailAndName()
  {
    $payload = [];

    $this->json('post', '/api/register', $payload)
    ->assertStatus(422)
    ->assertJson([
      'error'   => true,
      "message" => [
        "name" => [
          "The name field is required."
        ],
        "email" => [
          "The email field is required."
        ],
        "password" => [
          "The password field is required."
        ]
      ]
    ]);
  }
}
