<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\User;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UserController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(UserRepository $repository, UserValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->repository->get();
  }


  public function userGroups(User $user)
  {
    return $user->group()->with('icon')->get();
  }


  public function userPosts(User $user)
  {
    return $user->post()->with('user')->with('group')->get();
  }


  public function userVotes(User $user)
  {
    return $user->vote()->with('user')->with('post')->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $user = $this->repository->createUser($request->all());
      $response = [
        'message' => 'User created succesfully',
        'data' => $user
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ], 422);
    }
  }


  public function show(User $user)
  {
    return response()->json($user);
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $user = $this->repository->editUser($request->all(), $id);
      $response = [
        'message' => 'User updated succesfully',
        'data' => $user
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
