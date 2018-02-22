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
  protected $userRepository;
  protected $validator;

  public function __construct(UserRepository $userRepository, UserValidator $validator)
  {
    $this->userRepository = $userRepository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->userRepository->get();
  }


  public function userGroups(User $user)
  {
    return $user->group()->get();
  }


  public function userPosts(User $user)
  {
    return $user->post()->get();
  }


  public function userVotes(User $user)
  {
    return $user->vote()->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $user = $this->userRepository->createUser($request->all());
      $response = [
        'message' => 'User created'
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
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

      $user = $this->userRepository->editUser($request->all(), $id);
      $response = [
        'message' => 'User updated',
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
    $deleted = $this->userRepository->delete($id);
    return response()->json([
      'message' => 'Group deleted',
      'deleted' => $deleted,
    ]);
  }
}
