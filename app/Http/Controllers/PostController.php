<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
  protected $postRepository;

  public function __construct(PostRepository $postRepository)
  {
    $this->postRepository = $postRepository;
  }


  public function index()
  {
    return $this->postRepository->get();
  }


  public function postVotes(Post $post)
  {
    return $post->vote()->get();
  }


  public function postComments(Post $post)
  {
    return $post->comment()->get();
  }


  public function store(Request $request)
  {
    $post = $this->postRepository->createPost($request->all(), $request->get('user_id'), $request->get('group_id'));
    return response()->json($post, 201);
  }


  public function show(Post $post)
  {
    return response()->json($post);
  }


  public function update(Request $request, $id)
  {
    $post = $this->postRepository->editPost($request->all(), $id);
    $response = [
      'message' => 'Post updated',
      'data' => $post
    ];

    return response()->json($response);
  }


  public function destroy($id)
  {
    $deleted = $this->postRepository->delete($id);
    return response()->json([
      'message' => 'Post deleted.',
      'deleted' => $deleted,
    ]);
  }
}
