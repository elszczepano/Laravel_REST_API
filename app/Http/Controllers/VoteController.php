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
  protected $voteRepository;
  protected $validator;

  public function __construct(VoteRepository $voteRepository, VoteValidator $validator)
  {
    $this->voteRepository = $voteRepository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->voteRepository->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $vote = $this->voteRepository->createVote($request->all(), $request->get('user_id'), $request->get('post_id'));
      $response = [
        'message' => 'Vote created'
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function show(Vote $vote)
  {
    return response()->json($vote);
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $vote= $this->voteRepository->editVote($request->all(), $id);
      $response = [
        'message' => 'Vote updated',
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
    $deleted = $this->voteRepository->delete($id);
    return response()->json([
      'message' => 'Vote deleted',
      'deleted' => $deleted,
    ]);
  }
}
