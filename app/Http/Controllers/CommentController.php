<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
  protected $commentRepository;

  public function __construct(CommentRepository $commentRepository)
  {
    $this->commentRepository = $commentRepository;
  }


  public function index(Request $request)
  {
    return $this->commentRepository->get();
  }


  public function postComments(PostRepository $postRepository)
  {
    return $postRepository->comment()->get();
  }

  public function myComments(Request $request, $userId, UserRepository $userRepository)
	{
    $postId = $request->get('post_id');

		return $userRepository->myComments($postId, $userId);
	}

  public function store(Request $request)
  {
    $comment = $this->commentRepository->createComment($request->all(), $request->get('user_id'), $request->get('post_id'));
    return response()->json($comment, 201);
  }


  public function show(Comment $comment)
  {
    return response()->json($comment);
  }


  public function update(Request $request, $id)
  {
    $comment = $this->commentRepository->update($request->all(), $id);
    $response = [
      'message' => 'Comment updated',
      'data' => $comment
    ];

    return response()->json($response);
  }


  public function destroy($id)
  {
    $deleted = $this->commentRepository->delete($id);
    return response()->json([
      'message' => 'Comment deleted.',
      'deleted' => $deleted,
    ]);
  }
}
