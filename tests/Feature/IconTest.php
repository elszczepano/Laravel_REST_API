<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\Icon;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class IconTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsIconsAreCreatedCorrectly()
  {
    $payload = [
      'name' => 'Lorem'
    ];

    $this->json('post', '/api/icons', $payload, $this->headers())
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

  public function testsIconsAreUpdatedCorrectly()
  {
    $icon = Icon::first();

    $payload = [
      'name' => 'Ipsum'
    ];

    $response = $this->json('put', '/api/icons/' . $icon->id, $payload, $this->headers())
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

  public function testsIconsAreDeletedCorrectly()
  {
    $icon  = Icon::orderBy('id', 'desc')->first();

    $this->json('delete', '/api/icons/' . $icon->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testIconsAreListedCorrectly()
  {
    $response = $this->json('get', '/api/icons', [], $this->headers())
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
