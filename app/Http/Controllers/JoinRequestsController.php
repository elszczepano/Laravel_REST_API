<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\JoinRequests;
use App\Repositories\JoinRequestsRepository;
use App\Validators\JoinRequestsValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class JoinRequestsController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(JoinRequestsRepository $repository, JoinRequestsValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->repository->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $joinRequest = $this->repository->createJoinRequest($request->all(), $request->get('user_id'), $request->get('group_id'));
      $response = [
        'message' => 'Join request created succesfully',
        'data' => $joinRequest
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function show(JoinRequests $joinRequest)
  {
    return response()->json($joinRequest);
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $joinRequest = $this->repository->editJoinRequest($request->all(), $id);
      $response = [
        'message' => 'Join request updated succesfully',
        'data' => $joinRequest
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
      'message' => 'Join request deleted succesfully',
      'deleted' => $deleted,
    ]);
  }
}
