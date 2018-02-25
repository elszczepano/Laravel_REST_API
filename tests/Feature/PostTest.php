<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\Post;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsPostsAreCreatedCorrectly()
  {
    $payload = [
      'content' => 'Lorem ipsum dolor sit amet',
      'user_id' => 1,
      'group_id' => 1
    ];

    $this->json('post', '/api/posts', $payload, $this->headers())
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "content",
        "user_id",
        "group_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsPostsAreUpdatedCorrectly()
  {
    $post = Post::first();

    $payload = [
      'content' => 'Lorem'
    ];

    $response = $this->json('put', '/api/posts/' . $post->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "content",
        "user_id",
        "group_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsPostsAreDeletedCorrectly()
  {
    $post = Post::first();

    $this->json('delete', '/api/posts/' . $post->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testPostsAreListedCorrectly()
  {
    $response = $this->json('get', '/api/posts', [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      '*' => [
        "content",
        "rating",
        "user_id",
        "group_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }
}
