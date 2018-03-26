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
  protected $repository;
  protected $validator;

  public function __construct(PostRepository $repository, PostValidator $validator)
  {
    $this->repository= $repository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->repository->with('user')->with('group')->get();
  }


  public function postVotes(Post $post)
  {
    return $post->vote()->with('user')->with('post')->get();
  }


  public function postComments(Post $post)
  {
    return $post->comment()->with('user')->with('post')->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $post = $this->repository->createPost($request->all(), $request->get('user_id'), $request->get('group_id'));
      $response = [
        'message' => 'Post created succesfully',
        'data' => $post
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function show($id)
  {
    return $this->repository->with('user')->with('group')->get()->where('id','=',$id)->first();
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $post = $this->repository->editPost($request->all(), $id);
      $response = [
        'message' => 'Post updated succesfully',
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
    $deleted = $this->repository->delete($id);
    return response()->json([
      'message' => 'Post deleted succesfully',
      'deleted' => $deleted,
    ]);
  }
}
