<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Vote;
use App\Repositories\VoteRepository;
use App\Validators\VoteValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class VoteController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(VoteRepository $repository, VoteValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->repository->with('post')->with('user')->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $vote = $this->repository->createVote($request->all(), $request->get('user_id'), $request->get('post_id'));
      $response = [
        'message' => 'Vote created succesfully',
        'data' => $vote
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

      $vote= $this->repository->editVote($request->all(), $id);
      $response = [
        'message' => 'Vote updated succesfully',
        'data' => $vote
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
      'message' => 'Vote deleted succesfully',
      'deleted' => $deleted,
    ]);
  }
}
