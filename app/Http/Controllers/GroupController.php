<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Group;
use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class GroupController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(GroupRepository $repository, GroupValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->repository->with('icon')->get();
  }


  public function searchGroups(Request $request, Group $group)
  {
    $name = $request->get('name');
    return $group->where('name', 'like', '%'.$name.'%')->with('icon')->get();
  }


  public function searchByContent(Request $request,Group $group)
  {
    $content = $request->get('content');
    return $group->post()->where('content', 'like', '%'.$content.'%')->with('user')->with('group')->get();
  }


  public function groupUsers(Group $group)
  {
    return $group->user()->with('role')->orderBy('created_at', 'desc')->get();
  }

  public function showJoinRequests(Group $group)
  {
    return $group->joinRequests()->with('user')->with('group')->get();
  }

  public function groupPosts(Group $group)
  {
    return $group->post()->with('group')->with('user')->orderBy('created_at', 'desc')->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $group = $this->repository->createGroup($request->all());
      $response = [
        'message' => 'Group created succesfully',
        'data' => $group
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
    return $this->repository->with('icon')->get()->where('id','=',$id)->first();
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $group = $this->repository->editGroup($request->all(), $id);
      $response = [
        'message' => 'Group updated succesfully',
        'data' => $group
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
      'message' => 'Group deleted succesfully',
      'deleted' => $deleted,
    ]);
  }
}
