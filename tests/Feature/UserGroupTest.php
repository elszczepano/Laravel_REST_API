<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\UserGroup;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserGroupTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsUserGroupsAreCreatedCorrectly()
  {
    $payload = [
      'user_id' => 2,
      'group_id' => 2,
      'role_id' => 1
    ];

    $this->json('post', '/api/user-groups', $payload, $this->headers())
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "user_id",
        "group_id",
        "role_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsUserGroupsAreUpdatedCorrectly()
  {
    $userGroup = UserGroup::orderBy('id', 'desc')->first();

    $payload = [
      'role_id' => '2'
    ];

    $response = $this->json('put', '/api/user-groups/' . $userGroup->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "user_id",
        "group_id",
        "role_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsUserGroupsAreDeletedCorrectly()
  {
    $userGroup = UserGroup::orderBy('id', 'desc')->first();

    $this->json('delete', '/api/user-groups/' . $userGroup->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testUserGroupsAreListedCorrectly()
  {
    $response = $this->json('get', '/api/user-groups', [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      '*' => [
        "user_id",
        "group_id",
        "role_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }
}
