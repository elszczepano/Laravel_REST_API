<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\Comment;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class CommentTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsCommentsAreCreatedCorrectly()
  {
    $payload = [
      'content' => 'Lorem ipsum dolor sit amet',
      'user_id' => '1',
      'post_id' => '1'
    ];

    $this->json('post', '/api/comments', $payload, $this->headers())
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "content",
        "user_id",
        "post_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsCommentsAreUpdatedCorrectly()
  {
    $comment = Comment::first();

    $payload = [
      'content' => 'Lorem ipsum',
      'user_id' => '1',
      'post_id' => '1'
    ];

    $response = $this->json('put', '/api/comments/' . $comment->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "content",
        "user_id",
        "post_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsCommentsAreDeletedCorrectly()
  {
    $comment = Comment::first();

    $this->json('delete', '/api/comments/' . $comment->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testCommentsAreListedCorrectly()
  {
    $response = $this->json('get', '/api/comments', [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      '*' => [
        "content",
        "user_id",
        "post_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }
}
