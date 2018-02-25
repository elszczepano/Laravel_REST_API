<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\Notification;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class NotificationTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsNotificationsAreCreatedCorrectly()
  {
    $payload = [
      'content' => 'Lorem ipsum dolor sit amet',
      'user_id' => 1
    ];

    $this->json('post', '/api/notifications', $payload, $this->headers())
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "content",
        "user_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsNotificationsAreUpdatedCorrectly()
  {
    $notification = Notification::first();

    $payload = [
      'content' => 'Lorem'
    ];

    $response = $this->json('put', '/api/notifications/' . $notification->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "content",
        "user_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsNotificationsAreDeletedCorrectly()
  {
    $notification = Notification::first();

    $this->json('delete', '/api/notifications/' . $notification->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testNotificationsAreListedCorrectly()
  {
    $response = $this->json('get', '/api/notifications', [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      '*' => [
        "content",
        "user_id",
        "read",
        "updated_at",
        "created_at"
      ]
    ]);
  }
}
