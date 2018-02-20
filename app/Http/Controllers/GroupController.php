<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Group;
use App\Repositories\GroupRepository;

class GroupController extends Controller
{
  protected $groupRepository;

  public function __construct(GroupRepository $groupRepository)
  {
    $this->groupRepository = $groupRepository;
  }

  public function index()
  {
    return $this->groupRepository->get();
  }


  public function groupUsers(Group $group)
  {
    return $group->user()->get();
  }


  public function groupPosts(Group $group)
  {
    return $group->post()->get();
  }


  public function store(Request $request)
  {
    $group = $this->groupRepository->create($request->all());
    return response()->json($group, 201);
  }


  public function show(Group $group)
  {
    return response()->json($group);
  }


  public function update(Request $request, $id)
  {
    $group = $this->groupRepository->editGroup($request->all(), $id);
    $response = [
      'message' => 'Group updated',
      'data' => $group
    ];

    return response()->json($response);
  }


  public function destroy($id)
  {
    $deleted = $this->groupRepository->delete($id);
    return response()->json([
      'message' => 'Group deleted.',
      'deleted' => $deleted,
    ]);
  }
}
