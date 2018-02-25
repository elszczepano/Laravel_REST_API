<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\User;
use App\Entities\Vote;
use Tymon\JWTAuth\Facades\JWTAuth;

class VoteTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsVotesAreCreatedCorrectly()
  {
    $payload = [
      'user_id' => 1,
      'post_id' => 1,
      'voted' => true,
    ];

    $this->json('post', '/api/votes', $payload, $this->headers())
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "user_id",
        "post_id",
        "voted",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsVotesAreUpdatedCorrectly()
  {
    $vote = Vote::orderBy('id', 'desc')->first();

    $payload = [
      'voted' => false
    ];

    $response = $this->json('put', '/api/votes/' . $vote->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "user_id",
        "post_id",
        "voted",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsVotesAreDeletedCorrectly()
  {
    $vote = Vote::orderBy('id', 'desc')->first();

    $this->json('delete', '/api/votes/' . $vote->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testVotesAreListedCorrectly()
  {
    $response = $this->json('get', '/api/votes', [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      '*' => [
        "user_id",
        "post_id",
        "voted",
        "updated_at",
        "created_at"
      ]
    ]);
  }
}
