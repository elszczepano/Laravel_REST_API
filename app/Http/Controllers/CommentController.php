<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Comment;
use App\Repositories\CommentRepository;
use App\Validators\CommentValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class CommentController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(CommentRepository $repository, CommentValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->repository->with('user')->with('post')->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $comment = $this->repository->createComment($request->all(), $request->get('user_id'), $request->get('post_id'));
      $response = [
        'message' => 'Comment created succesfully',
        'data' => $comment
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
    return $this->repository->with('user')->with('post')->get()->where('id','=',$id)->first();
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $comment = $this->repository->editComment($request->all(), $id);
      $response = [
        'message' => 'Comment updated succesfully',
        'data' => $comment
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
      'message' => 'Comment deleted succesfully',
      'deleted' => $deleted,
    ]);
  }
}
