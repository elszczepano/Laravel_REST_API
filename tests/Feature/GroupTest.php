<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\Group;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class GroupTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsGroupsAreCreatedCorrectly()
  {
    $payload = [
      'name' => 'Lorem',
      'description' => 'Lorem ipsum dolor sit amet',
      'background_image' => UploadedFile::fake()->image('avatar.jpg'),
      'icon_id' => '1'
    ];

    $this->json('post', '/api/groups', $payload, $this->headers())
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "name",
        "description",
        "background_image",
        "icon_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsGroupsAreUpdatedCorrectly()
  {
    $group = Group::first();

    $payload = [
      'name' => 'Lorem'
    ];

    $response = $this->json('put', '/api/groups/' . $group->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "name",
        "description",
        "background_image",
        "icon_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsGroupsAreDeletedCorrectly()
  {
    $group = Group::first();

    $this->json('delete', '/api/groups/' . $group->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testGroupsAreListedCorrectly()
  {
    $response = $this->json('get', '/api/groups', [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      '*' => [
        "name",
        "description",
        "background_image",
        "icon_id",
        "updated_at",
        "created_at"
      ]
    ]);
  }
}
