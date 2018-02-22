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
  protected $commentRepository;
  protected $validator;

  public function __construct(CommentRepository $commentRepository, CommentValidator $validator)
  {
    $this->commentRepository = $commentRepository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->commentRepository->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $comment = $this->commentRepository->createComment($request->all(), $request->get('user_id'), $request->get('post_id'));
      $response = [
        'message' => 'Comment created'
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function show(Comment $comment)
  {
    return response()->json($comment);
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $comment = $this->commentRepository->editComment($request->all(), $id);
      $response = [
        'message' => 'Comment updated',
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
    $deleted = $this->commentRepository->delete($id);
    return response()->json([
      'message' => 'Comment deleted',
      'deleted' => $deleted,
    ]);
  }
}
