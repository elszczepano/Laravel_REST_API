<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Role;
use App\Repositories\RoleRepository;
use App\Validators\RoleValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class RoleController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(RoleRepository $repository, RoleValidator $validator)
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

      $role = $this->repository->create($request->all());
      $response = [
        'message' => 'Role created succesfully',
        'data' => $role
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function show(Role $role)
  {
    return response()->json($role);
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $role = $this->repository->editRole($request->all(), $id);
      $response = [
        'message' => 'Role updated succesfully',
        'data' => $role
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
      'message' => 'Role deleted succesfully',
      'deleted' => $deleted,
    ]);
  }
}
