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
  protected $roleRepository;
  protected $validator;

  public function __construct(RoleRepository $roleRepository, RoleValidator $validator)
  {
    $this->roleRepository = $roleRepository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->roleRepository->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $role = $this->roleRepository->createRole($request->all());
      $response = [
        'message' => 'Role created'
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

      $role = $this->roleRepository->editRole($request->all(), $id);
      $response = [
        'message' => 'Role updated',
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
    $deleted = $this->roleRepository->delete($id);
    return response()->json([
      'message' => 'Role deleted',
      'deleted' => $deleted,
    ]);
  }
}
