<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Role;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
  protected $roleRepository;

  public function __construct(RoleRepository $roleRepository)
  {
    $this->roleRepository = $roleRepository;
  }


  public function index()
  {
    return $this->roleRepository->get();
  }


  public function store(Request $request)
  {
    $role = $this->roleRepository->createRole($request->all());
    return response()->json($role, 201);
  }


  public function show(Role $role)
  {
    return response()->json($role);
  }


  public function update(Request $request, $id)
  {
    $role = $this->roleRepository->editRole($request->all(), $id);
    $response = [
      'message' => 'Role updated',
      'data' => $role
    ];

    return response()->json($response);
  }


  public function destroy($id)
  {
    $deleted = $this->roleRepository->delete($id);
    return response()->json([
      'message' => 'Role deleted.',
      'deleted' => $deleted,
    ]);
  }
}
