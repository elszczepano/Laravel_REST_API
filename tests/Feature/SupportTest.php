<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Entities\Support;
use App\Entities\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\UploadedFile;

class SupportTest extends TestCase
{
  public function headers()
  {
    $user = User::first();
    $token = JWTAuth::fromUser($user);
    $headers = ['Authorization' => "Bearer $token"];
    return $headers;
  }

  public function testsSupportsAreCreatedCorrectly()
  {
    $payload = [
      'content' => 'Something is not working!',
      'email' => 'lorem@example.com',
      'attachment' => UploadedFile::fake()->image('avatar.jpg')
    ];

    $this->json('post', '/api/support/', $payload, $this->headers())
    ->assertStatus(201)
    ->assertJsonStructure([
      "message",
      "data" => [
        "content",
        "email",
        "attachment",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsSupportsAreUpdatedCorrectly()
  {
    $support = Support::orderBy('id', 'desc')->first();

    $payload = [
      'content' => 'Something is not working again!'
    ];

    $response = $this->json('put', '/api/support/' . $support->id, $payload, $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "data" => [
        "content",
        "email",
        "attachment",
        "updated_at",
        "created_at"
      ]
    ]);
  }

  public function testsSupportsAreDeletedCorrectly()
  {
    $support = Support::orderBy('id', 'desc')->first();

    $this->json('delete', '/api/support/' . $support->id, [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      "message",
      "deleted"
    ]);
  }

  public function testSupportsAreListedCorrectly()
  {
    $response = $this->json('get', '/api/support/', [], $this->headers())
    ->assertStatus(200)
    ->assertJsonStructure([
      '*' => [
        "content",
        "email",
        "attachment",
        "updated_at",
        "created_at"
      ]
    ]);
  }
}
