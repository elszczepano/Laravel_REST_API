<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\Role;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class RoleTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsRolesAreCreatedCorrectly()
  {
    $payload = [
      'name' => 'Editor'
    ];

    $this->json('post', '/api/roles', $payload, $this->headers())
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "name",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsRolesAreUpdatedCorrectly()
  {
    $role = Role::orderBy('id', 'desc')->first();

    $payload = [
      'name' => 'User'
    ];

    $response = $this->json('put', '/api/roles/' . $role->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "name",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsRolesAreDeletedCorrectly()
  {
    $role = Role::orderBy('id', 'desc')->first();

    $this->json('delete', '/api/roles/' . $role->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testRolesAreListedCorrectly()
  {
    $response = $this->json('get', '/api/roles', [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      '*' => [
        "name",
        "updated_at",
        "created_at"
      ]
    ]);
  }
}
