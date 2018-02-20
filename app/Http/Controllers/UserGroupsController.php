<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\UserGroup;
use App\Repositories\UserGroupRepository;

class UserGroupsController extends Controller
{
  protected $userGroupRepository;

  public function __construct(UserGroupRepository $userGroupRepository)
  {
    $this->userGroupRepository = $userGroupRepository;
  }


  public function index()
  {
    return $this->userGroupRepository->get();
  }


  public function store(Request $request)
  {
    $userGroup = $this->userGroupRepository->createUserGroup($request->all());
    return response()->json($userGroup, 201);
  }


  public function show(UserGroup $userGroup)
  {
    return response()->json($userGroup);
  }


  public function update(Request $request, $id)
  {
    $userGroup = $this->userGroupRepository->editUserGroup($request->all(), $id);
    $response = [
      'message' => 'Updated',
      'data' => $userGroup
    ];

    return response()->json($response);
  }


  public function destroy($id)
  {
    $deleted = $this->userGroupRepository->delete($id);
    return response()->json([
      'message' => 'User removed from group',
      'deleted' => $deleted,
    ]);
  }
}
