<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Validators\PostValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class PostController extends Controller
{
  protected $postRepository;
  protected $validator;

  public function __construct(PostRepository $postRepository, PostValidator $validator)
  {
    $this->postRepository = $postRepository;
    $this->validator = $validator;
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
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $post = $this->postRepository->createPost($request->all(), $request->get('user_id'), $request->get('group_id'));
      $response = [
        'message' => 'Post created'
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function show(Post $post)
  {
    return response()->json($post);
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $post = $this->postRepository->editPost($request->all(), $id);
      $response = [
        'message' => 'Post updated',
        'data' => $post
      ];

      return response()->json($response);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }


  }


  public function destroy($id)
  {
    $deleted = $this->postRepository->delete($id);
    return response()->json([
      'message' => 'Post deleted',
      'deleted' => $deleted,
    ]);
  }
}
