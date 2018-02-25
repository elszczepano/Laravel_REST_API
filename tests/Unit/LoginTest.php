<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
  public function testRequiresEmailAndLogin()
  {
    $this->json('POST', 'api/login')
    ->assertStatus(422)
    ->assertJson([
      'error' => 'Incorrect email or password'
    ]);
  }

  public function testUserLoginsSuccessfully()
  {
    $payload = ['email' => 'johndoe@example.com', 'password' => 'secret'];

    $this->json('POST', 'api/login', $payload)
    ->assertStatus(200)
    ->assertJsonStructure([
        'access_token',
        'token_type',
        'expires_in'
    ]);
  }
}
