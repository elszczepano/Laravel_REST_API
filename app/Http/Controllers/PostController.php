<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Entities\Post;
use App\Entities\Group;
use App\Entities\User;
use App\Entities\Comment;
use App\Repositories\PostRepository;
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
