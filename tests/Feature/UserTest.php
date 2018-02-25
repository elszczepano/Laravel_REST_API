<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\UploadedFile;

class UserTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsUsersAreUpdatedCorrectly()
  {
    $user = User::orderBy('id', 'desc')->first();

    $payload = [
      'name' => 'Joe',
      'password' => 'secret',
      'avatar' => UploadedFile::fake()->image('avatar.jpg'),
    ];

    $response = $this->json('put', '/api/users/' . $user->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "name",
        "surname",
        "avatar",
        "email",
        "birth_date",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsUsersAreDeletedCorrectly()
  {
    $user = User::orderBy('id', 'desc')->first();

    $this->json('delete', '/api/users/' . $user->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testUsersAreListedCorrectly()
  {
    $response = $this->json('get', '/api/users', [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      '*' => [
        "name",
        "surname",
        "avatar",
        "email",
        "birth_date",
        "updated_at",
        "created_at"
      ]
    ]);
  }
}
