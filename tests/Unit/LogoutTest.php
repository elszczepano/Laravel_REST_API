<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Entities\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutTest extends TestCase
{
  public function testUserIsLoggedOutProperly()
    {
        $user = User::first();
        $token = JWTAuth::fromUser($user);
        $headers = ['Authorization' => "Bearer $token"];

        $this->json('get', '/api/posts', [], $headers)->assertStatus(200);
        $this->json('post', '/api/logout', [], $headers)->assertStatus(200);

    }

    public function testUserWithNullToken()
    {
      $user = User::first();
      $token = null;
      $headers = ['Authorization' => "Bearer $token"];



      $this->json('get', '/api/posts', [], $headers)->assertStatus(401);
    }
}
