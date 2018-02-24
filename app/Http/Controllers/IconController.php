<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Icon;
use App\Repositories\IconRepository;
use App\Validators\IconValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class IconController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(IconRepository $repository, IconValidator $validator)
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

      $icon = $this->repository->create($request->all());
      $response = [
        'message' => 'Icon created succesfully',
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


  public function show(Icon $icon)
  {
    return response()->json($icon);
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $icon = $this->repository->editIcon($request->all(), $id);
      $response = [
        'message' => 'Icon updated succesfully',
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
      'message' => 'Icon deleted succesfully',
      'deleted' => $deleted,
    ]);
  }
}
