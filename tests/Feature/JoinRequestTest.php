<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\JoinRequests;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class JoinRequestsTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsJoinRequestsAreCreatedCorrectly()
  {
    $payload = [
      'user_id' => 2,
      'group_id' => 2,
      'approved' => false
    ];

    $this->json('post', '/api/join-requests', $payload, $this->headers())
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "user_id",
        "group_id",
        "approved",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsJoinRequestsAreUpdatedCorrectly()
  {
    $joinRequest = JoinRequests::orderBy('id', 'desc')->first();

    $payload = [
      'approved' => true
    ];

    $response = $this->json('put', '/api/join-requests/' . $joinRequest->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "user_id",
        "group_id",
        "approved",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsJoinRequestsAreDeletedCorrectly()
  {
    $joinRequest = JoinRequests::orderBy('id', 'desc')->first();

    $this->json('delete', '/api/join-requests/' . $joinRequest->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testJoinRequestsAreListedCorrectly()
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
