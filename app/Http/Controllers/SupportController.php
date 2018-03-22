<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Support;
use App\Repositories\SupportRepository;
use App\Validators\SupportValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class SupportController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(SupportRepository $repository, SupportValidator $validator)
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

      $icon = $this->repository->createSupport($request->all());
      $response = [
        'message' => 'Issue sent succesfully',
        'data' => $icon
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function show(Support $support)
  {
    return response()->json($support);
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $icon = $this->repository->editSupport($request->all(), $id);
      $response = [
        'message' => 'Support message updated succesfully',
        'data' => $icon
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
      'message' => 'Support message deleted succesfully',
      'deleted' => $deleted,
    ]);
  }
}
