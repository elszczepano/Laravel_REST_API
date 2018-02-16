<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Post;
use App\Group;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    return Post::all();
  }


  public function userPosts(User $user)
  {
    return $user->post()->get();
  }


  public function groupPosts(Group $group)
  {
    return $group->post()->get();
  }


  public function store(Request $request)
  {
    $post = Post::create($request->all());

    return response()->json($post, 201);
  }


  public function show(Post $post)
  {
    return response()->json($post);
  }


  public function update(Request $request, Post $post)
  {
    $post->update($request->all());

    return response()->json($post);
  }


  public function destroy(Post $post)
  {
    $post->delete();

    return response()->json(null, 204);
  }
}
